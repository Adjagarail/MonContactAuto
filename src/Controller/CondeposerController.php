<?php

namespace App\Controller;

use App\Entity\Condeposer;
use App\Form\CondeposerType;
use App\Repository\CondeposerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administration/condeposer")
 */
class CondeposerController extends AbstractController
{
    /**
     * @Route("/", name="condeposer_index", methods={"GET"})
     */
    public function index(CondeposerRepository $condeposerRepository): Response
    {
        return $this->render('condeposer/index.html.twig', [
            'condeposers' => $condeposerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="condeposer_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $condeposer = new Condeposer();
        $form = $this->createForm(CondeposerType::class, $condeposer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($condeposer);
            $entityManager->flush();

            return $this->redirectToRoute('condeposer_index');
        }

        return $this->render('condeposer/new.html.twig', [
            'condeposer' => $condeposer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="condeposer_show", methods={"GET"})
     */
    public function show(Condeposer $condeposer): Response
    {
        return $this->render('condeposer/show.html.twig', [
            'condeposer' => $condeposer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="condeposer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Condeposer $condeposer): Response
    {
        $form = $this->createForm(CondeposerType::class, $condeposer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('condeposer_index');
        }

        return $this->render('condeposer/edit.html.twig', [
            'condeposer' => $condeposer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="condeposer_delete", methods={"POST"})
     */
    public function delete(Request $request, Condeposer $condeposer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$condeposer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($condeposer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('condeposer_index');
    }
}
