<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Voiture;
use App\Form\SearchForm;
use App\Repository\DestinerRepository;
use App\Repository\VoitureRepository;
use Knp\Component\Pager\PaginatorInterface;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/vente")
 */
class HomeAutoController extends AbstractController
{

    public function __construct(FlashyNotifier $flashy)
    {
        $this->flashy = $flashy;
    }

    /**
     * @Route("/", name="home_auto", methods={"GET"})
     */
    public function index(VoitureRepository  $voitureRepository, Request $request, PaginatorInterface $paginator): Response
    {

        $data = new SearchData();
        $data->page = $request->get('page', 1);
        $form = $this->createForm(SearchForm::class,$data);
        $form->handleRequest($request);
        $voitures = $voitureRepository->findSearch($data);
        return $this->render('home_auto/index.html.twig', [
            'voitures' => $voitures,
            'search' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="voiture_show1", methods={"GET"})
     */
    public function show(Voiture $voiture): Response
    {
        return $this->render('home_auto/show.html.twig', [
            'voitures' => $voiture,
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session,FlashyNotifier $flashyNotifier)
    {

        $panier = $session->get('panier', []);

        if(!empty($panier[$id])){
            $panier[$id];
        }else{
            $panier[$id] = 1;
        }
        $session->set('panier',$panier);
        $this->flashy->success('Event created!', 'http://your-awesome-link.com');

        return $this->redirectToRoute("panier");
    }
}
