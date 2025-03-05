<?php

namespace App\Form;

use App\Entity\Eleve;
use App\Entity\Financier;
use App\Entity\Individu;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('INE')
            ->add('secu')
            ->add('dateEntree', null, [
                'widget' => 'single_text',
            ])
            ->add('sexe')
            ->add('nationality')
            ->add('dateBirth', null, [
                'widget' => 'single_text',
            ])
            ->add('departmentBirth')
            ->add('gradeRepetition')
            ->add('regime')
            ->add('transport')
            ->add('immaVehicle')
            ->add('speciality')
            ->add('lv1')
            ->add('lv2')
            ->add('mdl')
            ->add('copyright')
            ->add('bachelor')
            ->add('vitalCard')
            ->add('idCertificate')
            ->add('assurance')
            ->add('cours')
            ->add('financier', EntityType::class, [
                'class' => Financier::class,
                'choice_label' => 'id',
            ])
            ->add('individu', EntityType::class, [
                'class' => Individu::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
