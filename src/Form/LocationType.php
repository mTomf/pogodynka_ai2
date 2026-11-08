<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('city', null, [
                'attr' => [
                    'placeholder' => 'Enter city',
                ],
            ])
            ->add('country', ChoiceType::class, [
                'choices' => [
                    'Poland' => 'PL',
                    'United States' => 'US',
                    'Germany' => 'DE',
                    'Spain' => 'ES',
                ],
            ])
            ->add('latitude', NumberType::class, [
                'input' => 'string',
                'scale' => 7,
                'html5' => false,
                'attr' => [
                    'placeholder' => 'Enter latitude',
                    'min' => -90,
                    'max' => 90,
                ],
            ])
            ->add('longitude', NumberType::class, [
                'input' => 'string',
                'scale' => 7,
                'html5' => false,
                'attr' => [
                    'placeholder' => 'Enter longitude',
                    'min' => -180,
                    'max' => 180,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
