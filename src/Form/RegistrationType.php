<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\AbstractType;
use App\Form\Type\EmailFieldType;
use App\Form\Type\TextFieldType;
use App\Form\Type\RepeatedFieldType;
use App\Form\Type\PasswordFieldType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;


class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextFieldType::class,
            [
                'label' => 'Nom / Prénom',
                'mapped' => true,
                'required' => true,
                'attr' => [
                    'minlength' => '2',
                    'maxlength' => '50',
                ],
                'constraints' => [
                    new Assert\Length(['min'=> 2, 'max' => 50]),
                    new Assert\NotBlank()
                ]

            ])
            ->add('pseudo', TextFieldType::class,
                [
                    'label' => 'Pseudo (facultatif)',
                    'mapped' => true,
                    'required' => false,
                    'attr' => [
                        'minlength' => '2',
                        'maxlength' => '50',
                    ],
                    'constraints' => [
                        new Assert\Length(['min'=> 2, 'max' => 50]),
                    ]

                ])
            ->add('email', EmailFieldType::class,
                [
                    'label' => 'Adresse email',
                    'mapped' => true,
                    'required' => true,
                    'attr' => [
                        'minlength' => '2',
                        'maxlength' => '180',
                    ],
                    'constraints' => [
                        new Assert\Length(['min'=> 2, 'max' => 180]),
                        new Assert\NotBlank(),
                        new Assert\Email()
                    ]

                ])
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
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
