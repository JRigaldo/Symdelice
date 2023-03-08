<?php

namespace App\Controller;

use App\Form\UserPasswordType;
use App\Form\UserType;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * ToDO: make the goods redirectToRoute link to user's data
     *
     * function that edit user profile
     *
     * @param Request $request
     * @param User $user
     * @return Response
     */
    #[Route('/admin/user/edit/{id}', name: 'admin.user.edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, UserPasswordHasherInterface $passwordHasher): Response
    {
        if(!$this->getUser()){
            return $this->redirectToRoute('security.login');
        }

        if($this->getUser() !== $user){
            return $this->redirectToRoute('home');
        }

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if($passwordHasher->isPasswordValid($user, $form->getData()->getPlainPassword())){
                $user = $form->getData();
                $this->em->persist($user);
                $this->em->flush();

                $this->addFlash('success', 'Les informations de votre compte ont bien été modifiées');

                return $this->redirectToRoute('home');
            }else{
                $this->addFlash('danger', 'Le mot de passe renseigné est incorrect !');
            }
        }

        return $this->render('user/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/utilisateur/edition-du-mot-de-passe/{id}', name: 'admin.edit.password', methods: ['GET', 'POST'])]
    public function editPassword(Request $request, User $user, UserPasswordHasherInterface $passwordHasher): Response
    {
        $form = $this->createForm(UserPasswordType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if($passwordHasher->isPasswordValid($user, $form->getData()['plainPassword'])){
                $user->setCreatedAt(new \DateTimeImmutable());
                $user->setPlainPassword($form->getData()['plainPassword']);

                $this->em->persist($user);
                $this->em->flush();

                $this->addFlash('success', 'Le mot de passe a été modifié');
                return $this->redirectToRoute('home');
            }else{
                $this->addFlash('danger', 'Le mot de passe est incorrect');
            }
        }

        return $this->render('user/edit_password.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
