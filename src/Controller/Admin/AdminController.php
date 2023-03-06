<?php

namespace App\Controller\Admin;

use App\Entity\Flavor;
use App\Form\FlavorType;
use App\Repository\FlavorRepository;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/admin/flavors/create', name: 'admin.flavor.create', methods: ['GET','POST'])]
    public function create(Request $request): Response
    {
        $flavors = $this->repo->findAll();
        $FlavorObject = new Flavor();
        $form = $this->createForm(FlavorType::class, $FlavorObject);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $FlavorObject = $form->getData();
            $this->em->persist($FlavorObject);
            $this->em->flush();
            $this->addFlash('success', 'Bien créé avec succès');
            return $this->redirectToRoute('admin.flavor.show');
        }

        return $this->render('admin/pages/create.html.twig',[
            'flavors' => $flavors,
            'form' => $form->createView()
        ]);
    }

    #[Route('/admin/flavors/edit/{slug}-{id}', name: 'admin.flavor.edit', methods: ['GET','POST'], requirements: ['slug' => '[a-z0-9\-]*'])]
    public function edit(Request $request, Flavor $flavor, string $slug, int $id): Response
    {
        $flavors = $this->repo->findAll();
        $FlavorObject = $this->repo->findOneBy(['id' => $id]);
        $form = $this->createForm(FlavorType::class, $FlavorObject);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $FlavorObject = $form->getData();
            $this->em->flush();
            $this->addFlash('success', 'Bien créé avec succès');
            return $this->redirectToRoute('admin.flavor.show');
        }

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

    #[Route('/admin/flavors/edit/{id}', name: 'admin.flavor.delete', methods: ['GET'])]
    public function delete(Flavor $flavor): Response
    {
        $this->em->remove($flavor);
        $this->em->flush();
        $this->addFlash('danger', 'Your flavor has been successfully removed');
        return $this->redirectToRoute('admin.flavor.show');
    }
}
