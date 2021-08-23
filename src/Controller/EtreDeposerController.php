<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtreDeposerController extends AbstractController
{
    /**
     * @Route("/etre/deposer", name="etre_deposer")
     */
    public function index(): Response
    {
        return $this->render('etre_deposer/index.html.twig', [
            'controller_name' => 'EtreDeposerController',
        ]);
    }
}
