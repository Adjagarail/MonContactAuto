<?php

namespace App\Controller;

use App\Entity\Images;
use App\Entity\Info;
use App\Form\InfoType;
use App\Repository\InfoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administration/info")
 */
class InfoController extends AbstractController
{
    /**
     * @Route("/", name="info_index", methods={"GET"})
     */
    public function index(InfoRepository $infoRepository): Response
    {
        return $this->render('info/index.html.twig', [
            'infos' => $infoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="info_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $info = new Info();
        $form = $this->createForm(InfoType::class, $info);
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
            $img = new Images();
            $img->setName($fichier);
            $info->addImage($img);
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($info);
            $entityManager->flush();

            return $this->redirectToRoute('info_index');
        }

        return $this->render('info/new.html.twig', [
            'info' => $info,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="info_show", methods={"GET"})
     */
    public function show(Info $info): Response
    {
        return $this->render('info/show.html.twig', [
            'info' => $info,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="info_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Info $info): Response
    {
        $form = $this->createForm(InfoType::class, $info);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('info_index');
        }

        return $this->render('info/edit.html.twig', [
            'info' => $info,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="info_delete", methods={"POST"})
     */
    public function delete(Request $request, Info $info): Response
    {
        if ($this->isCsrfTokenValid('delete'.$info->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($info);
            $entityManager->flush();
        }

        return $this->redirectToRoute('info_index');
    }
}
