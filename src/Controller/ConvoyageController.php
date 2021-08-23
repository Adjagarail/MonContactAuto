<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConvoyageController extends AbstractController
{
    /**
     * @Route("/convoyage", name="convoyage")
     */
    public function index(): Response
    {
        return $this->render('convoyage/index.html.twig', [
            'controller_name' => 'ConvoyageController',
        ]);
    }
}
