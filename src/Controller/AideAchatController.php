<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AideAchatController extends AbstractController
{
    /**
     * @Route("/aide/achat", name="aide_achat")
     */
    public function index(): Response
    {
        return $this->render('aide_achat/index.html.twig', [
            'controller_name' => 'AideAchatController',
        ]);
    }
}
