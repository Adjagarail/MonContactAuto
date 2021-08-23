<?php

namespace App\Controller;

use App\Entity\ConRecherche;
use App\Form\ConRechercheType;
use App\Repository\ConRechercheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administration/condition/recherche")
 */
class ConRechercheController extends AbstractController
{
    /**
     * @Route("/", name="con_recherche_index", methods={"GET"})
     */
    public function index(ConRechercheRepository $conRechercheRepository): Response
    {
        return $this->render('con_recherche/index.html.twig', [
            'con_recherches' => $conRechercheRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="con_recherche_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $conRecherche = new ConRecherche();
        $form = $this->createForm(ConRechercheType::class, $conRecherche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($conRecherche);
            $entityManager->flush();

            return $this->redirectToRoute('con_recherche_index');
        }

        return $this->render('con_recherche/new.html.twig', [
            'con_recherche' => $conRecherche,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="con_recherche_show", methods={"GET"})
     */
    public function show(ConRecherche $conRecherche): Response
    {
        return $this->render('con_recherche/show.html.twig', [
            'con_recherche' => $conRecherche,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="con_recherche_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ConRecherche $conRecherche): Response
    {
        $form = $this->createForm(ConRechercheType::class, $conRecherche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('con_recherche_index');
        }

        return $this->render('con_recherche/edit.html.twig', [
            'con_recherche' => $conRecherche,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="con_recherche_delete", methods={"POST"})
     */
    public function delete(Request $request, ConRecherche $conRecherche): Response
    {
        if ($this->isCsrfTokenValid('delete'.$conRecherche->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($conRecherche);
            $entityManager->flush();
        }

        return $this->redirectToRoute('con_recherche_index');
    }
}
