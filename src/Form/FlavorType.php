<?php

namespace App\Form;

use App\Entity\Flavor;
use App\Form\Type\CheckboxFieldType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\Type\TextFieldType;
use App\Form\Type\MoneyFieldType;
use Symfony\Component\Validator\Constraints as Assert;

class FlavorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',
                TextFieldType::class,
                [
                    'label' => 'Nom',
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
                ]
            )
            ->add('price',
                MoneyFieldType::class,
                [
                    'label' => 'Prix',
                    'mapped' => true,
                    'required' => true,
                    'constraints' => [
                        new Assert\Positive(),
                        new Assert\LessThan(200)
                    ]
                ]
            )
            ->add('stock',
                CheckboxFieldType::class,
                [
                    'required' => true,
                    'label_attr' => [
                        'yes' => 'Yes',
                        'no' => 'Non'
                    ]
                ]
            )
            ->add('topping',
                CheckboxFieldType::class,
                [
                    'required' => true,
                    'label_attr' => [
                        'yes' => 'Yes',
                        'no' => 'Non'
                    ]
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Flavor::class,
        ]);
    }
}
