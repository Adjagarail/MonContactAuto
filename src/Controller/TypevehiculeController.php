<?php

namespace App\Controller;

use App\Entity\Typevehicule;
use App\Form\TypevehiculeType;
use App\Repository\TypevehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typevehicule")
 */
class TypevehiculeController extends AbstractController
{
    /**
     * @Route("/", name="typevehicule_index", methods={"GET"})
     */
    public function index(TypevehiculeRepository $typevehiculeRepository): Response
    {
        return $this->render('typevehicule/index.html.twig', [
            'typevehicules' => $typevehiculeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="typevehicule_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typevehicule = new Typevehicule();
        $form = $this->createForm(TypevehiculeType::class, $typevehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typevehicule);
            $entityManager->flush();

            return $this->redirectToRoute('typevehicule_index');
        }

        return $this->render('typevehicule/new.html.twig', [
            'typevehicule' => $typevehicule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typevehicule_show", methods={"GET"})
     */
    public function show(Typevehicule $typevehicule): Response
    {
        return $this->render('typevehicule/show.html.twig', [
            'typevehicule' => $typevehicule,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="typevehicule_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Typevehicule $typevehicule): Response
    {
        $form = $this->createForm(TypevehiculeType::class, $typevehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typevehicule_index');
        }

        return $this->render('typevehicule/edit.html.twig', [
            'typevehicule' => $typevehicule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typevehicule_delete", methods={"POST"})
     */
    public function delete(Request $request, Typevehicule $typevehicule): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typevehicule->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typevehicule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('typevehicule_index');
    }
}
