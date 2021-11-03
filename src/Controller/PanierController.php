<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(SessionInterface $session, VoitureRepository $voitureRepository): Response
    {

        $panier = $session->get('panier', []);

        $panierWithData = [];


        foreach ($panier as $id => $quantity){
            $panierWithData[] = [
                'voiture' => $voitureRepository->find($id),
                'quantity' => $quantity
            ];
        }
        return $this->render('panier/index.html.twig', [
            'contenupanier' => $panierWithData,
        ]);
    }
    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */

    public function remove($id, SessionInterface $session)
    {
        $panier = $session->get('panier',[]);

        if(!empty($panier[$id])) {
            unset($panier[$id]);
        }
        $session->set('panier',$panier);

        return $this->redirectToRoute("panier");
    }
}
