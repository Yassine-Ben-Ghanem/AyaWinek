<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_ride', DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',],['mapped' => false])
            ->add('pick_up_from', ChoiceType::class, [
                    'choices'  => [
                        'Tunis' => 'Tunis',
                        'Sfax' => 'Sfax',
                        'Kairouan' => 'Kairouan',
                        'Mahdia' => 'Mahdia',
                        'Nabel' => 'Nabel',
                        'Benzart' => 'Benzart',
                        'Gabes' => 'Gabes',
                        'Gassrine' => 'Gassrine',
                        'Zaghwen' => 'Zaghwen',
                        'ben guerdan' => 'ben guerdan',
                        'Gafsa' => 'Gafsa',],
                    'mapped' => false]) 
            ->add('drop_to', ChoiceType::class, [
                        'choices'  => [
                        'Tunis' => 'Tunis',
                        'Sfax' => 'Sfax',
                        'Kairouan' => 'Kairouan',
                        'Mahdia' => 'Mahdia',
                        'Nabel' => 'Nabel',
                        'Benzart' => 'Benzart',
                        'Gabes' => 'Gabes',
                        'Gassrine' => 'Gassrine',
                        'Zaghwen' => 'Zaghwen',
                        'ben guerdan' => 'ben guerdan',
                        'Gafsa' => 'Gafsa', 

                        ],'mapped' => false])   
            ->add('Number_adulte',NumberType::class,['mapped' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
