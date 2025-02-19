<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use App\Repository\ConvoyageRepository;
use App\Repository\DemenagementRepository;
use App\Repository\ExpertiseRepository;
use App\Repository\RacheterRepository;
use App\Repository\RechercheRepository;
use App\Repository\SubscribeRepository;
use App\Repository\TransportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SendmailController extends AbstractController
{
    /**
     * @Route("/administration", name="sendmail")
     */
    public function index(SubscribeRepository $subscribeRepository, ClientRepository $clientRepository,
                          RacheterRepository $racheterRepository, ConvoyageRepository $convoyageRepository,
                          ExpertiseRepository $expertiseRepository, RechercheRepository $rechercheRepository,
                            DemenagementRepository $transportRepository
                            ): Response
    {


        $numberCustomers = $clientRepository->findAll();
        $numberSells = $racheterRepository->findAll();
        $numberConvoyages = $convoyageRepository->findAll();
        $numberExpertises = $expertiseRepository->findAll();
        $numberRecherches = $rechercheRepository->findAll();
        $numberDeposits = $transportRepository->findAll();


        return $this->render('sendmail/index.html.twig', [

            "numberCustomers" => $numberCustomers,
            "numberSells" => $numberSells,
            "numberConvoyages" => $numberConvoyages,
            "numberExpertises" => $numberExpertises,
            "numberRecherches" => $numberRecherches,
            "numberDeposits" => $numberDeposits,

        ]);
    }
}
