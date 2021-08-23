<?php

namespace App\Controller;

use App\Entity\Condconvoyage;
use App\Form\CondconvoyageType;
use App\Repository\CondconvoyageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/condconvoyage")
 */
class CondconvoyageController extends AbstractController
{
    /**
     * @Route("/", name="condconvoyage_index", methods={"GET"})
     */
    public function index(CondconvoyageRepository $condconvoyageRepository): Response
    {
        return $this->render('condconvoyage/index.html.twig', [
            'condconvoyages' => $condconvoyageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="condconvoyage_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $condconvoyage = new Condconvoyage();
        $form = $this->createForm(CondconvoyageType::class, $condconvoyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($condconvoyage);
            $entityManager->flush();

            return $this->redirectToRoute('condconvoyage_index');
        }

        return $this->render('condconvoyage/new.html.twig', [
            'condconvoyage' => $condconvoyage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="condconvoyage_show", methods={"GET"})
     */
    public function show(Condconvoyage $condconvoyage): Response
    {
        return $this->render('condconvoyage/show.html.twig', [
            'condconvoyage' => $condconvoyage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="condconvoyage_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Condconvoyage $condconvoyage): Response
    {
        $form = $this->createForm(CondconvoyageType::class, $condconvoyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('condconvoyage_index');
        }

        return $this->render('condconvoyage/edit.html.twig', [
            'condconvoyage' => $condconvoyage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="condconvoyage_delete", methods={"POST"})
     */
    public function delete(Request $request, Condconvoyage $condconvoyage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$condconvoyage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($condconvoyage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('condconvoyage_index');
    }
}
