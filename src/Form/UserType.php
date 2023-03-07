<?php

namespace App\Form;

use App\Entity\User;
use App\Form\Type\PasswordFieldType;
use App\Form\Type\RepeatedFieldType;
use App\Form\Type\TextFieldType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class UserType extends AbstractType
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
            ->add('plainPassword', PasswordFieldType::class, [
                'label' => 'Mot de passe',
                'required' => true,
                'mapped' => true,
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
