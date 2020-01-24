<?php

namespace App\Controller;

use App\Entity\Donatie;
use App\Form\DonatieType;
use App\Repository\DonatieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/donatie")
 */
class DonatieController extends AbstractController
{
    /**
     * @Route("/", name="donatie_index", methods={"GET"})
     */
    public function index(DonatieRepository $donatieRepository): Response
    {
        return $this->render('donatie/index.html.twig', [
            'donaties' => $donatieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="donatie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $donatie = new Donatie();
        $form = $this->createForm(DonatieType::class, $donatie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($donatie);
            $entityManager->flush();

            return $this->redirectToRoute('donatie_index');
        }

        return $this->render('donatie/new.html.twig', [
            'donatie' => $donatie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="donatie_show", methods={"GET"})
     */
    public function show(Donatie $donatie): Response
    {
        return $this->render('donatie/show.html.twig', [
            'donatie' => $donatie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="donatie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Donatie $donatie): Response
    {
        $form = $this->createForm(DonatieType::class, $donatie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('donatie_index');
        }

        return $this->render('donatie/edit.html.twig', [
            'donatie' => $donatie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="donatie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Donatie $donatie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$donatie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($donatie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('donatie_index');
    }
}
