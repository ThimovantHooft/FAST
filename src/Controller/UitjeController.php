<?php

namespace App\Controller;

use App\Entity\Uitje;
use App\Form\UitjeType;
use App\Repository\UitjeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/uitje")
 */
class UitjeController extends AbstractController
{
    /**
     * @Route("/", name="uitje_index", methods={"GET"})
     */
    public function index(UitjeRepository $uitjeRepository): Response
    {
        return $this->render('uitje/index.html.twig', [
            'uitjes' => $uitjeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="uitje_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $uitje = new Uitje();
        $form = $this->createForm(UitjeType::class, $uitje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($uitje);
            $entityManager->flush();

            return $this->redirectToRoute('uitje_index');
        }

        return $this->render('uitje/new.html.twig', [
            'uitje' => $uitje,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="uitje_show", methods={"GET"})
     */
    public function show(Uitje $uitje): Response
    {
        return $this->render('uitje/show.html.twig', [
            'uitje' => $uitje,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="uitje_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Uitje $uitje): Response
    {
        $form = $this->createForm(UitjeType::class, $uitje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('uitje_index');
        }

        return $this->render('uitje/edit.html.twig', [
            'uitje' => $uitje,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="uitje_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Uitje $uitje): Response
    {
        if ($this->isCsrfTokenValid('delete'.$uitje->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($uitje);
            $entityManager->flush();
        }

        return $this->redirectToRoute('uitje_index');
    }
}
