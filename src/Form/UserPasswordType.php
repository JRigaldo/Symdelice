<?php

namespace App\Form;

use App\Entity\User;
use App\Form\Type\PasswordFieldType;
use App\Form\Type\RepeatedFieldType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class UserPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('plainPassword', RepeatedFieldType::class, [
                'type' => PasswordFieldType::class,
                'invalid_message' => 'Les mots de passe ne correspondent pas',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'mapped' => true,
                'first_options' => [
                    'label' => 'Mot de passe',
                ],
                'second_options' => [
                    'label' => 'Confirmation de mot de passe',
                ]
            ])
            ->add('newPassword', PasswordFieldType::class, [
                'label' => 'Nouveau mot de passe',
                'constraints' => [new Assert\NotBlank()]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary',
                ]
            ])
        ;
    }
}