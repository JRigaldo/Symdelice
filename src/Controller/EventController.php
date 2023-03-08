<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager, EventRepository $repository)
    {
        $this->em = $entityManager;
        $this->repo = $repository;
    }

    #[Route('/evenements', name: 'event.show', methods: ['GET'])]
    public function show(EventRepository $repository): Response
    {
        $events = $repository->findAll();
        return $this->render('admin/pages/event/show.html.twig', [
            'events' => $events,
        ]);
    }

    #[Route('evenement/nouveau', name: 'event.create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        $events = $this->repo->findAll();
        $eventObject = new Event();
        $form = $this->createForm(EventType::class, $eventObject);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $eventData = $form->getData();
            $this->em->persist($eventData);
            $this->em->flush();

            $this->addFlash('success', 'Votre événement à bien été créé');

            return $this->redirectToRoute('event.show');
        }

        return $this->render('admin/pages/event/create.html.twig', [
           'events' => $events,
           'form' => $form->createView()
        ]);
    }

    #[Route('evenement/editer', name: 'event.edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Event $event, string $slug): Response
    {
        $events = $this->repo->findAll();

        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $eventData = $form->getData();
            $this->em->persist($eventData);
            $this->em->flush();

            $this->addFlash('success', 'Votre événement à bien été créé');

            return $this->redirectToRoute('event.show');
        }

        if($event->getSlug() !== $slug){
            return $this->redirectToRoute('event.show', [
                'id' => $event->getId(),
                'slug' => $event->getSlug()
            ], 301);
        }

        return $this->render('admin/pages/event/show.html.twig', [
            'events' => $events,
            'eventCurrent' => $event,
            'form' => $form->createView()
        ]);
    }

    #[Route('evenement/supprimer/{id}', name: 'event.delete', methods: ['GET', 'POST'])]
    public function delete(Request $request, Event $event): Repsonse
    {
        if($this->isCsrfTokenValid('delete' . $event->getId(), $request->get('_token'))){
            $this->em->persist($event);
            $this->em->flush();
            $this->addFlash('success', "L'événement à bien été supprimé");
        }
        return $this->redirectToRoute('event.show');
    }
}
