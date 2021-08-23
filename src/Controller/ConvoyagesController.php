<?php

namespace App\Controller;

use App\Entity\Convoyage;
use App\Form\ConvoyageType;
use App\Repository\CondconvoyageRepository;
use App\Repository\ConvoyageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/convoyages")
 */
class ConvoyagesController extends AbstractController
{
    /**
     * @Route("/", name="convoyages_index", methods={"GET"})
     */
    public function index(ConvoyageRepository $convoyageRepository): Response
    {
        return $this->render('convoyages/index.html.twig', [
            'convoyages' => $convoyageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="convoyages_new", methods={"GET","POST"})
     */
    public function new(Request $request,CondconvoyageRepository $condconvoyageRepository): Response
    {
        $convoyage = new Convoyage();
        $form = $this->createForm(ConvoyageType::class, $convoyage);
        $form->handleRequest($request);

        $conditions = $condconvoyageRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($convoyage);
            $entityManager->flush();

            return $this->redirectToRoute('convoyages_index');
        }

        return $this->render('convoyages/new.html.twig', [
            'convoyage' => $convoyage,
            'conditions' => $conditions,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="convoyages_show", methods={"GET"})
     */
    public function show(Convoyage $convoyage): Response
    {
        return $this->render('convoyages/show.html.twig', [
            'convoyage' => $convoyage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="convoyages_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Convoyage $convoyage): Response
    {
        $form = $this->createForm(ConvoyageType::class, $convoyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('convoyages_index');
        }

        return $this->render('convoyages/edit.html.twig', [
            'convoyage' => $convoyage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="convoyages_delete", methods={"POST"})
     */
    public function delete(Request $request, Convoyage $convoyage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$convoyage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($convoyage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('convoyages_index');
    }
}
