<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->redirectToRoute('home_page');
    }

    /**
     * @Route("/accueil", name="home_page")
     */
    public function homePage(): Response
    {
        return $this->render('home/index.html.twig', [
            'connected' => true,
            'restos' => [
                [
                    'name' => 'Bougnat Burger',
                    'slug' => 'bougnat_burger',
                    'adresse' => '42 boulevard cote blatin',
                    'telephone' => '06.65.68.62.64',
                    'prix' => '€€',
                    'image' => 'https://media-cdn.tripadvisor.com/media/photo-p/11/d0/0d/bd/bougnat-burger.jpg',
                    'tags' => [
                        'Burgers',
                    ]
                ],
                [
                    'name' => 'Pataterie',
                    'slug' => 'pataterie',
                    'adresse' => '118 boulevard cote blatin',
                    'telephone' => '06.64.62.65.68',
                    'prix' => '€€€',
                    'image' => 'https://mvistatic.com/photosmvi/2021/09/08/P28031610D4812296G.jpg',
                    'tags' => [
                        'Micro-onde', 'Patates', 'Fromage',
                    ]
                ]
            ],
        ]);
    }

    /**
     * @Route("/reservations/{slug}", name="booking")
     * @param string $slug
     * @return Response
     */
    public function booking(string $slug): Response
    {
        return $this->render('booking/index.html.twig', [
            'connected' => false,
            'slug' => $slug,
        ]);
    }
}
