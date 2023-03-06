<?php

namespace App\Controller;

use App\Repository\FlavorRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @ORM\Embeddable
 */
class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {

        return $this->render('pages/index.html.twig');
    }

    #[Route('/menu', name: 'menu')]
    public function menu(): Response
    {

        return $this->render('pages/menu.html.twig');
    }

    #[Route('/event', name: 'event')]
    public function event(): Response
    {

        return $this->render('pages/event.html.twig');
    }

    #[Route('/prix', name: 'price', methods: ['GET'])]
    public function price(FlavorRepository $repository): Response
    {
        $flavors = $repository->findAll();
        return $this->render('pages/price.html.twig', [
            'flavors' => $flavors
        ]);
    }

    #[Route('/concept', name: 'concept')]
    public function concept(): Response
    {

        return $this->render('pages/concept.html.twig');
    }

    #[Route('/erreur', name: 'error')]
    public function error(): Response
    {

        return $this->render('pages/error.html.twig');
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {

        return $this->render('pages/contact.html.twig');
    }
}
