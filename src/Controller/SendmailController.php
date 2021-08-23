<?php

namespace App\Controller;

use App\Repository\SubscribeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SendmailController extends AbstractController
{
    /**
     * @Route("/administration", name="sendmail")
     */
    public function index(SubscribeRepository $subscribeRepository): Response
    {

        $adressemail = $subscribeRepository->findContactSubscribe();

        $adressemail2 = array_column($adressemail,'email');



        return $this->render('sendmail/index.html.twig', [

        ]);
    }
}
