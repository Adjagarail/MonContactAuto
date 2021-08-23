<?php

namespace App\Controller;

use App\Entity\Racheter;
use App\Form\RacheterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Racheter1Controller extends AbstractController
{

    /**
     * @Route("/racheter1", name="racheter1", methods={"GET","POST"})
     */
    public function index(Request $request): Response
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

        return $this->render('racheter1/index.html.twig', [
            'racheter' => $racheter,
            'form' => $form->createView(),
        ]);
    }
}
