<?php

namespace App\Controller;

use App\Entity\Subscribe;
use App\Form\Subscribe1Type;
use App\Repository\SubscribeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/subscribe")
 */
class SubscribeController extends AbstractController
{
    /**
     * @Route("/", name="subscribe_index", methods={"GET"})
     */
    public function index(SubscribeRepository $subscribeRepository): Response
    {
        return $this->render('subscribe/index.html.twig', [
            'subscribes' => $subscribeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="subscribe_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $subscribe = new Subscribe();
        $form = $this->createForm(Subscribe1Type::class, $subscribe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($subscribe);
            $entityManager->flush();

            return $this->redirectToRoute('subscribe_index');
        }

        return $this->render('subscribe/new.html.twig', [
            'subscribe' => $subscribe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="subscribe_show", methods={"GET"})
     */
    public function show(Subscribe $subscribe): Response
    {
        return $this->render('subscribe/show.html.twig', [
            'subscribe' => $subscribe,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="subscribe_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Subscribe $subscribe): Response
    {
        $form = $this->createForm(Subscribe1Type::class, $subscribe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subscribe_index');
        }

        return $this->render('subscribe/edit.html.twig', [
            'subscribe' => $subscribe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="subscribe_delete", methods={"POST"})
     */
    public function delete(Request $request, Subscribe $subscribe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$subscribe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($subscribe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('subscribe_index');
    }
}
