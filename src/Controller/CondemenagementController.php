<?php

namespace App\Controller;

use App\Entity\Condemenagement;
use App\Form\CondemenagementType;
use App\Repository\CondemenagementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administration/condemenagement")
 */
class CondemenagementController extends AbstractController
{
    /**
     * @Route("/", name="condemenagement_index", methods={"GET"})
     */
    public function index(CondemenagementRepository $condemenagementRepository): Response
    {
        return $this->render('condemenagement/index.html.twig', [
            'condemenagements' => $condemenagementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="condemenagement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $condemenagement = new Condemenagement();
        $form = $this->createForm(CondemenagementType::class, $condemenagement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($condemenagement);
            $entityManager->flush();

            return $this->redirectToRoute('condemenagement_index');
        }

        return $this->render('condemenagement/new.html.twig', [
            'condemenagement' => $condemenagement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="condemenagement_show", methods={"GET"})
     */
    public function show(Condemenagement $condemenagement): Response
    {
        return $this->render('condemenagement/show.html.twig', [
            'condemenagement' => $condemenagement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="condemenagement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Condemenagement $condemenagement): Response
    {
        $form = $this->createForm(CondemenagementType::class, $condemenagement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('condemenagement_index');
        }

        return $this->render('condemenagement/edit.html.twig', [
            'condemenagement' => $condemenagement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="condemenagement_delete", methods={"POST"})
     */
    public function delete(Request $request, Condemenagement $condemenagement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$condemenagement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($condemenagement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('condemenagement_index');
    }
}
