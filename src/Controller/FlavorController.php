<?php

namespace App\Controller;

use App\Entity\Flavor;
use App\Form\FlavorType;
use App\Repository\FlavorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class FlavorController extends AbstractController
{

    public function __construct(FlavorRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repo = $repository;
        $this->em = $entityManager;
    }

    /**
     * Display all Flavors
     * @param FlavorRepository $repository
     * @return Response
     */
    #[Route('/parfums', name: 'flavor.show', methods: ['GET'])]
    public function show(FlavorRepository $repository): Response
    {
        $flavors = $repository->findAll();
        return $this->render('admin/pages/flavor/show.html.twig', [
            'flavors' => $flavors
        ]);
    }

    #[Route('/parfum/ajouter', name: 'flavor.create', methods: ['GET','POST'])]
    public function create(Request $request): Response
    {
        $flavors = $this->repo->findAll();
        $flavorObject = new Flavor();
        $form = $this->createForm(FlavorType::class, $flavorObject);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $flavorData = $form->getData();
            $this->em->persist($flavorData);
            $this->em->flush();
            $this->addFlash('success', 'Successfully created');
            return $this->redirectToRoute('flavor.show');
        }

        return $this->render('admin/pages/flavor/create.html.twig',[
            'flavors' => $flavors,
            'form' => $form->createView()
        ]);
    }

    #[Route('/parfum/editer/{slug}-{id}', name: 'flavor.edit', methods: ['GET','POST'], requirements: ['slug' => '[a-z0-9\-]*'])]
    public function edit(Request $request, Flavor $flavor, string $slug): Response
    {
        $flavors = $this->repo->findAll();

        $form = $this->createForm(FlavorType::class, $flavor);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $flavorData = $form->getData();
            $this->em->persist($flavorData);
            $this->em->flush();

            $this->addFlash('success', 'Successfully edited');
            return $this->redirectToRoute('flavor.show');
        }

        if($flavor->getSlug() !== $slug){
            return $this->redirectToRoute('flavor.show', [
                'id' => $flavor->getId(),
                'slug' => $flavor->getSlug()
            ], 301);
        }

        return $this->render('admin/pages/flavor/edit.html.twig',[
            'flavors' => $flavors,
            'flavorCurrent' => $flavor,
            'form' => $form->createView()
        ]);
    }

    #[Route('/parfum/supprimer/{id}', name: 'flavor.delete', methods: ['GET', 'POST'])]
    public function delete(Flavor $flavor, Request $request): Response
    {
        if($this->isCsrfTokenValid('delete' . $flavor->getId(), $request->get('_token'))){
            $this->em->remove($flavor);
            $this->em->flush();
            $this->addFlash('danger', 'Successfully removed');
        }
        return $this->redirectToRoute('flavor.show');
    }
}
