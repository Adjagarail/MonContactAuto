<?php

namespace App\Controller;

use App\Entity\Racheter;
use App\Form\RacheterType;
use App\Repository\RacheterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administration/racheter")
 */
class RacheterController extends AbstractController
{
    /**
     * @Route("/", name="racheter_index", methods={"GET"})
     */
    public function index(RacheterRepository $racheterRepository): Response
    {
        return $this->render('racheter/index.html.twig', [
            'racheters' => $racheterRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="racheter_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $racheter = new Racheter();
        $form = $this->createForm(RacheterType::class, $racheter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($racheter);
            $entityManager->flush();

            return $this->redirectToRoute('racheter_index');
        }

        return $this->render('racheter/new.html.twig', [
            'racheter' => $racheter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="racheter_show", methods={"GET"})
     */
    public function show(Racheter $racheter): Response
    {
        return $this->render('racheter/show.html.twig', [
            'racheter' => $racheter,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="racheter_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Racheter $racheter): Response
    {
        $form = $this->createForm(RacheterType::class, $racheter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('racheter_index');
        }

        return $this->render('racheter/edit.html.twig', [
            'racheter' => $racheter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="racheter_delete", methods={"POST"})
     */
    public function delete(Request $request, Racheter $racheter): Response
    {
        if ($this->isCsrfTokenValid('delete'.$racheter->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($racheter);
            $entityManager->flush();
        }

        return $this->redirectToRoute('racheter_index');
    }
}
