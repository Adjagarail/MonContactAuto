<?php

namespace App\Controller;

use App\Entity\Demenagement;
use App\Entity\Transport;
use App\Form\DemenagementType;
use App\Form\TransportType;
use App\Repository\CondemenagementRepository;
use App\Repository\CondeposerRepository;
use App\Repository\TransportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/transport1", name="transport1")
 */
class TransportController extends AbstractController
{
    /**
     * @Route("/demenagement", name="demenagement")
     */
    public function demenagement(Request $request, CondemenagementRepository $condemenagementRepository): Response
    {
        $demenagement = new Demenagement();

        $demenagement->setTransport('demenagement');
        $form = $this->createForm(DemenagementType::class, $demenagement);
        $form->handleRequest($request);
        $conditions = $condemenagementRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($demenagement);
            $entityManager->flush();

        }

        return $this->render('transport/demenagement.html.twig', [
            'form' => $form->createView(),
            'conditions' => $conditions
        ]);
    }

    /**
     * @Route("/demenagement-list",name="demenagement-list",methods={"GET"})
     */
    public function demenagementliste(TransportRepository $transportRepository):Response
    {
        return $this->render('transport/demenagement-list.html.twig',[
            'transports' => $transportRepository->findAll(),
        ]);
    }

    /**
     * @Route("/deposer", name="deposer")
     */
    public function deposer(Request $request, CondeposerRepository $condeposerRepository): Response
    {
        $deposer = new Transport();
        $deposer->setTransport('deposer');
        $form = $this->createForm(TransportType::class, $deposer);
        $form->handleRequest($request);
        $conditions = $condeposerRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($deposer);
            $entityManager->flush();

        }
        return $this->render('transport/deposer.html.twig', [
            'form' => $form->createView(),
            'conditions' => $conditions
        ]);
    }
    /**
     * @Route("/deposer-list",name="deposer-list",methods={"GET"})
     */
    public function transportliste(TransportRepository $transportRepository):Response
    {
        return $this->render('transport/transport-list.html.twig',[
            'transports' => $transportRepository->findAll(),
        ]);
    }


}
