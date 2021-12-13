<?php

namespace App\Controller;

use App\Entity\Pres;
use App\Form\PresType;
use App\Repository\PresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pres")
 */
class PresController extends AbstractController
{
    /**
     * @Route("/", name="pres_index", methods={"GET"})
     */
    public function index(PresRepository $presRepository): Response
    {
        return $this->render('pres/index.html.twig', [
            'pres' => $presRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pres_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pre = new Pres();
        $form = $this->createForm(PresType::class, $pre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pre);
            $entityManager->flush();

            return $this->redirectToRoute('pres_index');
        }

        return $this->render('pres/new.html.twig', [
            'pre' => $pre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pres_show", methods={"GET"})
     */
    public function show(Pres $pre): Response
    {
        return $this->render('pres/show.html.twig', [
            'pre' => $pre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pres_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pres $pre): Response
    {
        $form = $this->createForm(PresType::class, $pre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pres_index');
        }

        return $this->render('pres/edit.html.twig', [
            'pre' => $pre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pres_delete", methods={"POST"})
     */
    public function delete(Request $request, Pres $pre): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pre->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pres_index');
    }
}
