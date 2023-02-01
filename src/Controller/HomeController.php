<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

    #[Route('/prix', name: 'price')]
    public function price(): Response
    {

        return $this->render('pages/price.html.twig');
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

    #[Route('/login', name: 'login')]
    public function login(): Response
    {

        return $this->render('pages/login.html.twig');
    }

    #[Route('/signup', name: 'signup')]
    public function signup(): Response
    {

        return $this->render('pages/signup.html.twig');
    }
}
