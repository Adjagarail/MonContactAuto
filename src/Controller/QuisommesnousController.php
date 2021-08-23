<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuisommesnousController extends AbstractController
{
    /**
     * @Route("/quisommesnous", name="quisommesnous")
     */
    public function index(): Response
    {
        return $this->render('quisommesnous/index.html.twig', [
            'controller_name' => 'QuisommesnousController',
        ]);
    }
}
