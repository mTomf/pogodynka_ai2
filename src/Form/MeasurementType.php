<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Measurement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => fn (Location $location) => sprintf('%s (%s)', $location->getCity(), $location->getCountry()),
                'placeholder' => 'Choose location',
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('temperature_c', NumberType::class, [
                'label' => 'Temperature',
                'input' => 'string',
                'scale' => 0,
                'html5' => false,
                'attr' => [
                    'placeholder' => 'Enter temperature',
                    'min' => -60,
                    'max' => 60,
                ],
            ])
            ->add('cloudiness_pct', NumberType::class, [
                'label' => 'Cloudiness (%)',
                'input' => 'string',
                'scale' => 0,
                'html5' => false,
                'attr' => [
                    'placeholder' => 'Enter cloudiness',
                    'min' => 0,
                    'max' => 100,
                ],
            ])
            ->add('wind_direction_deg', NumberType::class, [
                'label' => 'Wind direction (°)',
                'input' => 'string',
                'scale' => 0,
                'html5' => false,
                'attr' => [
                    'placeholder' => 'Enter wind direction',
                    'min' => 0,
                    'max' => 359,
                ],
            ])
            ->add('pressure_hpa', NumberType::class, [
                'label' => 'Pressure (hPa)',
                'input' => 'string',
                'scale' => 0,
                'html5' => false,
                'attr' => [
                    'placeholder' => 'Enter pressure',
                    'min' => 870,
                    'max' => 1085,
                ],
            ])
            ->add('humidity_pct', NumberType::class, [
                'label' => 'Humidity (%)',
                'input' => 'string',
                'scale' => 0,
                'html5' => false,
                'attr' => [
                    'placeholder' => 'Enter humidity',
                    'min' => 0,
                    'max' => 100,
                ],
            ])
            ->add('wind_speed_kmh', NumberType::class, [
                'label' => 'Wind speed (km/h)',
                'input' => 'string',
                'scale' => 0,
                'html5' => false,
                'attr' => [
                    'placeholder' => 'Enter wind speed',
                    'min' => 0,
                    'max' => 400,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
