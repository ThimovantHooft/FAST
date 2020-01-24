<?php

namespace App\Controller;

use App\Entity\Winkel;
use App\Form\WinkelType;
use App\Repository\WinkelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/winkel")
 */
class WinkelController extends AbstractController
{
    /**
     * @Route("/", name="winkel_index", methods={"GET"})
     */
    public function index(WinkelRepository $winkelRepository): Response
    {
        return $this->render('winkel/index.html.twig', [
            'winkels' => $winkelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="winkel_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $winkel = new Winkel();
        $form = $this->createForm(WinkelType::class, $winkel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($winkel);
            $entityManager->flush();

            return $this->redirectToRoute('winkel_index');
        }

        return $this->render('winkel/new.html.twig', [
            'winkel' => $winkel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="winkel_show", methods={"GET"})
     */
    public function show(Winkel $winkel): Response
    {
        return $this->render('winkel/show.html.twig', [
            'winkel' => $winkel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="winkel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Winkel $winkel): Response
    {
        $form = $this->createForm(WinkelType::class, $winkel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('winkel_index');
        }

        return $this->render('winkel/edit.html.twig', [
            'winkel' => $winkel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="winkel_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Winkel $winkel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$winkel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($winkel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('winkel_index');
    }
}
