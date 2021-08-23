<?php

namespace App\Controller;

use App\Entity\Vvente;
use App\Form\VventeType;
use App\Repository\VventeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vventes")
 */
class VventesController extends AbstractController
{
    /**
     * @Route("/", name="vventes_index", methods={"GET"})
     */
    public function index(VventeRepository $vventeRepository): Response
    {
        return $this->render('vventes/index.html.twig', [
            'vventes' => $vventeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="vventes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $vvente = new Vvente();
        $form = $this->createForm(VventeType::class, $vvente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vvente);
            $entityManager->flush();

            return $this->redirectToRoute('vventes_index');
        }

        return $this->render('vventes/new.html.twig', [
            'vvente' => $vvente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vventes_show", methods={"GET"})
     */
    public function show(Vvente $vvente): Response
    {
        return $this->render('vventes/show.html.twig', [
            'vvente' => $vvente,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="vventes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vvente $vvente): Response
    {
        $form = $this->createForm(VventeType::class, $vvente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vventes_index');
        }

        return $this->render('vventes/edit.html.twig', [
            'vvente' => $vvente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vventes_delete", methods={"POST"})
     */
    public function delete(Request $request, Vvente $vvente): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vvente->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vvente);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vventes_index');
    }
}
