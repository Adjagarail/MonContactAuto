<?php

namespace App\Controller;

use App\Entity\Conexpertise;
use App\Form\ConexpertiseType;
use App\Repository\ConexpertiseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administration/conexpertise")
 */
class ConexpertiseController extends AbstractController
{
    /**
     * @Route("/", name="conexpertise_index", methods={"GET"})
     */
    public function index(ConexpertiseRepository $conexpertiseRepository): Response
    {
        return $this->render('conexpertise/index.html.twig', [
            'conexpertises' => $conexpertiseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="conexpertise_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $conexpertise = new Conexpertise();
        $form = $this->createForm(ConexpertiseType::class, $conexpertise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($conexpertise);
            $entityManager->flush();

            return $this->redirectToRoute('conexpertise_index');
        }

        return $this->render('conexpertise/new.html.twig', [
            'conexpertise' => $conexpertise,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="conexpertise_show", methods={"GET"})
     */
    public function show(Conexpertise $conexpertise): Response
    {
        return $this->render('conexpertise/show.html.twig', [
            'conexpertise' => $conexpertise,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="conexpertise_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Conexpertise $conexpertise): Response
    {
        $form = $this->createForm(ConexpertiseType::class, $conexpertise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('conexpertise_index');
        }

        return $this->render('conexpertise/edit.html.twig', [
            'conexpertise' => $conexpertise,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="conexpertise_delete", methods={"POST"})
     */
    public function delete(Request $request, Conexpertise $conexpertise): Response
    {
        if ($this->isCsrfTokenValid('delete'.$conexpertise->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($conexpertise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('conexpertise_index');
    }
}
