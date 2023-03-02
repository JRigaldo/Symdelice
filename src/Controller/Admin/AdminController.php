<?php

namespace App\Controller\Admin;

use App\Entity\Flavor;
use App\Form\FlavorType;
use App\Repository\FlavorRepository;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController
{

    #[Route('/admin', name: 'admin.dashboard', methods: ['GET'])]
    public function index(FlavorRepository $repository): Response
    {
        $flavors = $repository->findAll();

        return $this->render('admin/pages/index.html.twig', [
            'flavors' => $flavors
        ]);
    }

    /**
     * Display all Fflavors
     * @param FlavorRepository $repository
     * @return Response
     */
    #[Route('/admin/flavors/show', name: 'admin.flavor.show', methods: ['GET'])]
    public function show(FlavorRepository $repository): Response
    {
        $flavors = $repository->findAll();

        return $this->render('admin/pages/show.html.twig', [
            'flavors' => $flavors
        ]);
    }

    #[Route('/admin/flavors/new', name: 'admin.flavor.new', methods: ['GET','POST'])]
    public function new(): Response
    {
        $flavor = new Flavor();
        $form = $this->createForm(FlavorType::class, $flavor);

        return $this->render('admin/pages/new.html.twig',[
            'form' => $form->createView()
        ]);
    }

    #[Route('/admin/flavors/edit/{slug}-{id}', name: 'admin.flavor.edit', methods: ['GET','POST'], requirements: ['slug' => '[a-z0-9\-]*'])]
    public function edit(FlavorRepository $repository, Flavor $flavor, string $slug): Response
    {
        $flavors = $repository->findAll();
        $FlavorObject = new Flavor();
        $form = $this->createForm(FlavorType::class, $FlavorObject);

        if($flavor->getSlug() !== $slug){
            return $this->redirectToRoute('admin/flavors/show', [
                'id' => $flavor->getId(),
                'slug' => $flavor->getSlug()
            ], 301);
        }

        return $this->render('admin/pages/edit.html.twig',[
            'flavors' => $flavors,
            'flavorCurrent' => $flavor,
            'form' => $form->createView()
        ]);
    }
}
