<?php

namespace App\Form;

use App\Entity\Event;
use App\Form\Type\ChoiceFieldType;
use App\Form\Type\TextFieldType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('address', TextFieldType::class,[
                'label' => 'Adresse',
                'required' => true,
                'attr' => [
                    'minlength' => '2',
                    'maxlength' => '100',
                ]
            ])
            ->add('street_number', TextFieldType::class,[
                'label' => 'Numéro de rue',
                'required' => true,
            ])
            ->add('city', TextFieldType::class,[
                'label' => 'Ville',
                'required' => true,
            ])
            ->add('state', ChoiceFieldType::class,[
                'label' => 'Canton',
                'required' => true,
                'multiple' => false,
                'choices' => Event::STATE_ARRAY,
            ])
            ->add('postcode', NumberType::class, [
                'label' => 'Numéro postal',
                'required' => true,
            ])
            ->add('eventName', TextFieldType::class, [
                'label' => 'Nom de l\'événement',
            ])
            ->add('guestsNumber', NumberType::class, [
                'label' => 'Nom de l\'événement',
            ])
            ->add('advanceTime', ChoiceFieldType::class, [
                'label' => 'Canton',
            ])
            ->add('eventDate', DateType::class, )
            ->add('availableTimeForEvent', RangeType::class, [
                'attr' => [
                    'min' => 1,
                    'max' => 8
                ],
            ])
            ->add('eventTime')
            ->add('eventType')
            ->add('eventKind')
            ->add('lactoseIntolerant')
            ->add('nearbyPowerSupply')
            ->add('ShortWalkingDistance')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
