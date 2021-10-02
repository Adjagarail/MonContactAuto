<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Voiture;
use App\Form\VoitureType;
use App\Repository\SubscribeRepository;
use App\Repository\VoitureRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administration/voiture")
 */
class VoitureController extends AbstractController
{
    /**
     * @Route("/", name="voiture_index", methods={"GET"})
     */
    public function index(VoitureRepository $voitureRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $voitures = $voitureRepository->findAll();
        $pagination = $paginator->paginate(
            $voitures, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            2 /*limit per page*/
        );
        return $this->render('voiture/index.html.twig', [
            'voitures' => $pagination
        ]);
    }

    /**
     * @Route("/new", name="voiture_new", methods={"GET","POST"})
     */
    public function new(Request $request, \Swift_Mailer $mailer, SubscribeRepository $subscribeRepository): Response
    {
        $voiture = new Voiture();

        $contact = $subscribeRepository->findContactSubscribe();
        $contact1 = array_column($contact, 'email');



        $voiture->setDateAt(new \DateTime());


        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);
        $images = (array) $form->get('images')->getData();

        foreach($images as $image){
            // On génère un nouveau nom de fichier
            $fichier = md5(uniqid()).'.'.$image->guessExtension();

            // On copie le fichier dans le dossier uploads
            $image->move(
                $this->getParameter('images_directory'),
                $fichier
            );

            // On crée l'image dans la base de données
            $img = new Image();
            $img->setName($fichier);
            $voiture->addImage($img);
        }


        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($voiture);
            dd($voiture);
            $entityManager->flush();

            $message = (new \Swift_Message('Information mon contact auto'))
                ->setFrom('moncontactauto@gmail.com')
                ->setTo($contact1)
                ->setBody(
                    $this->renderView(
                        'email.html.twig'
                    ),
                    'text/html'
                );
            $mailer->send($message);

            return $this->redirectToRoute('voiture_index');
        }

        return $this->render('voiture/new.html.twig', [
            'voiture' => $voiture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="voiture_show", methods={"GET"})
     */
    public function show(Voiture $voiture): Response
    {
        return $this->render('voiture/show.html.twig', [
            'voiture' => $voiture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="voiture_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Voiture $voiture): Response
    {
        $voiture->setDateAt(new \DateTime());
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('voiture_index');
        }

        return $this->render('voiture/edit.html.twig', [
            'voiture' => $voiture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="voiture_delete", methods={"POST"})
     */
    public function delete(Request $request, Voiture $voiture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$voiture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($voiture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('voiture_index');
    }
}
