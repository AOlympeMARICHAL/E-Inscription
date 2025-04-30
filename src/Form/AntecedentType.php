<?php

namespace App\Form;

use App\Entity\Antecedent;
use App\Entity\Eleve;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AntecedentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('annee', null, [
                'widget' => 'single_text',
            ])
            ->add('classe')
            ->add('lv1')
            ->add('lv2')
            ->add('option')
            ->add('school')
            ->add('id_eleve', EntityType::class, [
                'class' => Eleve::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Antecedent::class,
        ]);
    }
}
