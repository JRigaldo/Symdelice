<?php

namespace App\Form;

use App\Entity\User;
use App\Form\Type\TextFieldType;
use Symfony\Component\Form\AbstractType;
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
                    'required' => true,
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
            ->add('password')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
