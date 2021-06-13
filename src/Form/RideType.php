<?php

namespace App\Form;

use App\Entity\Ride;
use App\Entity\Driver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RideType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pick_up_time')
            ->add('pick_up_from')
            ->add('drop_to')
            ->add('type_ride')
            ->add('amount')
            ->add('driver',EntityType::class,[
                'class' => Driver::class,

                'choice_label' => 'first_mame',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ride::class,
        ]);
    }
}
