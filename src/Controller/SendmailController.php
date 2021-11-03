<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use App\Repository\RacheterRepository;
use App\Repository\SubscribeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SendmailController extends AbstractController
{
    /**
     * @Route("/administration", name="sendmail")
     */
    public function index(SubscribeRepository $subscribeRepository, ClientRepository $clientRepository, RacheterRepository $racheterRepository): Response
    {

        $adressemail = $subscribeRepository->findContactSubscribe();

        $numberCustomers = $clientRepository->findAll();
        $numberSells = $racheterRepository->findAll();


        return $this->render('sendmail/index.html.twig', [

            "numberCustomers" => $numberCustomers,
            "numberSells" => $numberSells,

        ]);
    }
}
