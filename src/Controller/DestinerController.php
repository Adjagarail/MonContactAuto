<?php

namespace App\Controller;

use App\Entity\Destiner;
use App\Form\DestinerType;
use App\Repository\DestinerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/destiner")
 */
class DestinerController extends AbstractController
{
    /**
     * @Route("/", name="destiner_index", methods={"GET"})
     */
    public function index(DestinerRepository $destinerRepository): Response
    {
        return $this->render('destiner/index.html.twig', [
            'destiners' => $destinerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="destiner_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $destiner = new Destiner();
        $form = $this->createForm(DestinerType::class, $destiner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($destiner);
            $entityManager->flush();

            return $this->redirectToRoute('destiner_index');
        }

        return $this->render('destiner/new.html.twig', [
            'destiner' => $destiner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="destiner_show", methods={"GET"})
     */
    public function show(Destiner $destiner): Response
    {
        return $this->render('destiner/show.html.twig', [
            'destiner' => $destiner,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="destiner_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Destiner $destiner): Response
    {
        $form = $this->createForm(DestinerType::class, $destiner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('destiner_index');
        }

        return $this->render('destiner/edit.html.twig', [
            'destiner' => $destiner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="destiner_delete", methods={"POST"})
     */
    public function delete(Request $request, Destiner $destiner): Response
    {
        if ($this->isCsrfTokenValid('delete'.$destiner->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($destiner);
            $entityManager->flush();
        }

        return $this->redirectToRoute('destiner_index');
    }
}
