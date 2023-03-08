<?php

namespace App\Controller;

use App\Repository\FlavorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    public function __construct(FlavorRepository $repository,EntityManagerInterface $entityManager)
    {
        $this->repo = $repository;
        $this->em = $entityManager;
    }
    #[Route('/admin', name: 'admin.dashboard', methods: ['GET'])]
    public function index(FlavorRepository $repository): Response
    {
        $flavors = $repository->findAll();

        return $this->render('admin/pages/dashboard.html.twig', [
            'flavors' => $flavors
        ]);
    }
}
