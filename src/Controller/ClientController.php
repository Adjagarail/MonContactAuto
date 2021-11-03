<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Voiture;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administration/client")
 */
class ClientController extends AbstractController
{
    /**
     * @Route("/", name="client_index", methods={"GET"})
     */
    public function index(ClientRepository $clientRepository, VoitureRepository $voitureRepository): Response
    {

        $voitures1 = $clientRepository->findAll();

        $voituresData = [];
        foreach ($voitures1 as $idvoiture){
            $voituresData[] = [
                'voiture' => $voitureRepository->find($idvoiture)
            ];
        }
        ;

        return $this->render('client/index.html.twig', [
            'clients' => $clientRepository->findAll(),
            'voitureData' => $voituresData,
        ]);
    }

    /**
     * @Route("/{id}", name="client_show", methods={"GET"})
     */
    public function show(Client $client,VoitureRepository $voitureRepository): Response
    {
        $voituress= $client->getIdvoiture();
        $clientData = [];
        foreach ($voituress as $id => $quantity){
            $clientData[] = [
                'voiture' => $voitureRepository->find(20),
                'quantity' => $quantity
            ];
        }
        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="client_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Client $client): Response
    {
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('client_index');
        }

        return $this->render('client/edit.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="client_delete", methods={"POST"})
     */
    public function delete(Request $request, Client $client): Response
    {
        if ($this->isCsrfTokenValid('delete'.$client->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($client);
            $entityManager->flush();
        }

        return $this->redirectToRoute('client_index');
    }
}
