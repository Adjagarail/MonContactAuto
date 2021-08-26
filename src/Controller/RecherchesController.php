<?php

namespace App\Controller;

use App\Entity\Recherche;
use App\Form\RechercheType;
use App\Repository\ConRechercheRepository;
use App\Repository\RechercheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/recherches")
 */
class RecherchesController extends AbstractController
{
    /**
     * @Route("/administration/", name="recherches_index", methods={"GET"})
     */
    public function index(RechercheRepository $rechercheRepository): Response
    {
        return $this->render('recherches/index.html.twig', [
            'recherches' => $rechercheRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="recherches_new", methods={"GET","POST"})
     */
    public function new(Request $request, ConRechercheRepository $conRechercheRepository): Response
    {
        $recherche = new Recherche();
        $form = $this->createForm(RechercheType::class, $recherche);
        $form->handleRequest($request);
        $conditions = $conRechercheRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recherche);
            $entityManager->flush();

            return $this->redirectToRoute('recherches_index');
        }

        return $this->render('recherches/new.html.twig', [
            'recherche' => $recherche,
            'form' => $form->createView(),
            'conditions' => $conditions
        ]);
    }

    /**
     * @Route("/administration/{id}", name="recherches_show", methods={"GET"})
     */
    public function show(Recherche $recherche): Response
    {
        return $this->render('recherches/show.html.twig', [
            'recherche' => $recherche,
        ]);
    }

    /**
     * @Route("/administration/{id}/edit", name="recherches_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Recherche $recherche): Response
    {
        $form = $this->createForm(RechercheType::class, $recherche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recherches_index');
        }

        return $this->render('recherches/edit.html.twig', [
            'recherche' => $recherche,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/administration/{id}", name="recherches_delete", methods={"POST"})
     */
    public function delete(Request $request, Recherche $recherche): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recherche->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($recherche);
            $entityManager->flush();
        }

        return $this->redirectToRoute('recherches_index');
    }
}
