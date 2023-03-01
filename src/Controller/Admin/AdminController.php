<?php

namespace App\Controller\Admin;

use App\Entity\Flavor;
use App\Form\FlavorType;
use App\Repository\FlavorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController
{

    /**
     * Display all Fflavors
     * @param FlavorRepository $repository
     * @return Response
     */
    #[Route('/admin', name: 'admin.dashboard', methods: ['GET'])]
    public function index(FlavorRepository $repository): Response
    {
        $flavors = $repository->findAll();

        return $this->render('admin/pages/index.html.twig', [
            'flavors' => $flavors
        ]);
    }

    #[Route('/admin/new', name: 'flavor.new', methods: ['GET','POST'])]
    public function new(): Response
    {
        $flavor = new Flavor();
        $form = $this->createForm(FlavorType::class, $flavor);

        return $this->render('admin/pages/new.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
