<?php

namespace App\Controller;

use App\Entity\Expertise;
use App\Form\ExpertiseType;
use App\Repository\ConexpertiseRepository;
use App\Repository\ExpertiseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/expertises")
 */
class ExpertisesController extends AbstractController
{
    /**
     * @Route("/", name="expertises_index", methods={"GET"})
     */
    public function index(ExpertiseRepository $expertiseRepository): Response
    {
        return $this->render('expertises/index.html.twig', [
            'expertises' => $expertiseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="expertises_new", methods={"GET","POST"})
     */
    public function new(Request $request, ConexpertiseRepository $conexpertiseRepository): Response
    {
        $expertise = new Expertise();
        $form = $this->createForm(ExpertiseType::class, $expertise);
        $form->handleRequest($request);
        $conditions = $conexpertiseRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($expertise);
            $entityManager->flush();

            return $this->redirectToRoute('expertises_index');
        }

        return $this->render('expertises/new.html.twig', [
            'expertise' => $expertise,
            'form' => $form->createView(),
            'conditions' => $conditions
        ]);
    }

    /**
     * @Route("/{id}", name="expertises_show", methods={"GET"})
     */
    public function show(Expertise $expertise): Response
    {
        return $this->render('expertises/show.html.twig', [
            'expertise' => $expertise,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="expertises_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Expertise $expertise): Response
    {
        $form = $this->createForm(ExpertiseType::class, $expertise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('expertises_index');
        }

        return $this->render('expertises/edit.html.twig', [
            'expertise' => $expertise,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="expertises_delete", methods={"POST"})
     */
    public function delete(Request $request, Expertise $expertise): Response
    {
        if ($this->isCsrfTokenValid('delete'.$expertise->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($expertise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('expertises_index');
    }
}
