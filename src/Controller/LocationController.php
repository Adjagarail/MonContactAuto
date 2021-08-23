<?php

namespace App\Controller;

use App\Data\LocationData;
use App\Entity\Voiture;
use App\Form\SearchForm;
use App\Form\SearchLocation;
use App\Repository\VoitureRepository;
use App\Repository\VoituresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocationController extends AbstractController
{
    /**
     * @Route("/location", name="location")
     */
    public function index(VoituresRepository  $voitureRepository, Request $request,VoitureRepository  $voitureRepositorys): Response
    {

        $data = new LocationData();
        $data->page = $request->get('page', 1);
        $form = $this->createForm(SearchLocation::class,$data);
        $form->handleRequest($request);
        $voitures = $voitureRepositorys->findTest($data);
        return $this->render('location/index.html.twig', [
            'voitures' => $voitures,
            'search' => $form->createView(),
        ]);
    }



    /**
     * @Route("/location/{id}", name="voiture_show2", methods={"GET"})
     */
    public function show(Voiture $voiture): Response
    {
        return $this->render('location/show.html.twig', [
            'voitures' => $voiture,
        ]);
    }
}
