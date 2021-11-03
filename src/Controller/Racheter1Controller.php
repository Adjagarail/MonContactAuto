<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Pictures;
use App\Entity\Racheter;
use App\Form\RacheterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class Racheter1Controller extends AbstractController
{
    private $flashMessage;

    public function __construct(FlashBagInterface $flashMessage){

        $this->flashMessage = $flashMessage;
    }

    /**
     * @Route("/racheter1", name="racheter1", methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {
        $racheter = new Racheter();
        $form = $this->createForm(RacheterType::class, $racheter);
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
            $img = new Pictures();
            $img->setName($fichier);
            $racheter->addPicture($img);
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($racheter);
            $entityManager->flush();

            $this->flashMessage->add("success","Test Flash Bag");

            return $this->redirectToRoute('racheter1');
        }

        return $this->render('racheter1/index.html.twig', [
            'racheter' => $racheter,
            'form' => $form->createView(),
        ]);
    }
}
