<?php

namespace App\Controller;

use App\Entity\Vvente;
use App\Form\VenteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class EnVenteController extends AbstractController
{
    /**
     * @Route("/en/vente", name="en_vente",methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {
        $vvente = new Vvente();
        $form = $this->createForm(VenteType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vvente);
            $entityManager->flush();
        }
        return $this->render('en_vente/index.html.twig', [
            'vvente' => $vvente,
            'formulaire' => $form->createView()
        ]);
    }
}
