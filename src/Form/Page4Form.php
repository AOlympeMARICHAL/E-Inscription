<?php

namespace App\Form;

use App\Entity\Responsable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Page4Form extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('relation')
            ->add('homePhone')
            ->add('workPhone')
            ->add('sms')
            ->add('job')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Responsable::class,
        ]);
    }
}
