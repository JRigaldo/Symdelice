<?php

namespace App\Form;

use App\Entity\Flavor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\Type\TextFieldType;

class FlavorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',
                TextFieldType::class
            )
            /*
            ->add('price')
            ->add('stock')
            ->add('topping')
            ->add('createdAt')
            */
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Flavor::class,
        ]);
    }
}
