<?php

namespace App\Controller;

use App\Data\VoitureData;
use App\Entity\Client;
use App\Entity\Racheter;
use App\Entity\Subscribe;
use App\Form\ClientType;
use App\Form\RacheterType;
use App\Form\VoitureDataType;
use App\Repository\InfoRepository;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(InfoRepository $infoRepository, Request $request, VoitureRepository $voitureRepository): Response
    {
        $data = new VoitureData();
        $data1 = new Racheter();
        $data->page = $request->get('page', 1);
        $form1 = $this->createForm(RacheterType::class, $data1);
        $form = $this->createForm(VoitureDataType::class, $data);
        $form->handleRequest($request);
        $voitures = $voitureRepository->findCar($data);
        if($form->isSubmitted() && $form->isValid()){



            return $this->render('home/render.html.twig', [
                'voituresSearch' => $voitures,
            ]);
        }

        $lastvoitures = $voitureRepository->lastcarSearch();
        $lastvoiture = $voitureRepository->lastSearch();


        return $this->render('home/index.html.twig', [
            'infos' => $infoRepository->findAll(),
            'formSearch' => $form->createView(),
            'formRacheter' => $form1->createView(),
            'lastvoitures' => $lastvoitures,
            'lastvoituress' => $lastvoiture
        ]);
    }

    /**
     * @Route("/ajout/ajax/email/{email}", name="mail" ,methods={"POST"})
     * @return Response
     */
    public function ajaxRequest(string $email, EntityManagerInterface $entityManager, Request $request):Response {

        $subscribe = new Subscribe();
         $subscribe->setEmail(trim(strip_tags($email)));
         $entityManager->persist($subscribe);
         $entityManager->flush();
         $id = $subscribe->getId();
         $this->addFlash(
             'info',
             'Ajouter avec succès'
         );
         return new JsonResponse('Email existante dans notre base de donnée');
    }

    /**
     * @Route("/client/new", name="client_new", methods={"GET","POST"})
     */
    public function new(SessionInterface $session, Request $request, \Swift_Mailer $mailer): Response
    {


        $client = new Client();
        $panier = $session->get('panier');
        foreach ($panier as $id => $quantity){
            $panierWithData[] = [$id];
        }
        $client->setIdvoiture($panierWithData);
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();
            $panier = $session->get('panier',[]);

            foreach ($panier as $id => $quantity){
                if(!empty($panier[$id])) {
                    unset($panier[$id]);
                }
            }

            $session->set('panier',$panier);
            $message = (new \Swift_Message('Nouveau contact'))
                // On attribue l'expéditeur
                ->setFrom("oumarsow.dev@gmail.com")
                // On attribue le destinataire
                ->setTo('oo2sow@gmail.com')
                // On crée le texte avec la vue
                ->setBody(
                    'Bonjour test réussie'
                )
            ;
            $mailer->send($message);

            return $this->redirectToRoute('client_index');
        }

        return $this->render('client/new.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }
}
