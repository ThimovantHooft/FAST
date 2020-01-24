<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BedanktController extends AbstractController
{
    /**
     * @Route("/bedankt", name="bedankt")
     */
    public function index()
    {
        return $this->render('bedankt/index.html.twig', [
            'controller_name' => 'BedanktController',
        ]);
    }
}
