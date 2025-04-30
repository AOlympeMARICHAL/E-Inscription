<?php

namespace App\Form;

use App\Entity\Urgence;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UrgenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateVaccine', null, [
                'widget' => 'single_text',
            ])
            ->add('observation')
            ->add('nameDoctor')
            ->add('addressDoctor')
            ->add('phoneDoctor')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Urgence::class,
        ]);
    }
}
