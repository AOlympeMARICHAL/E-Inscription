<?php

namespace App\Form;

use App\Entity\Financier;
use App\Entity\Individu;
use App\Entity\Responsable;
use App\Entity\Urgence;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IndividuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('lastname')
            ->add('email')
            ->add('mobilePhone')
            ->add('address')
            ->add('zip')
            ->add('city')
            ->add('commune')
            ->add('nameBoss')
            ->add('addressBoss')
            ->add('financier', EntityType::class, [
                'class' => Financier::class,
                'choice_label' => 'id',
            ])
            ->add('responsable', EntityType::class, [
                'class' => Responsable::class,
                'choice_label' => 'id',
            ])
            ->add('urgence', EntityType::class, [
                'class' => Urgence::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Individu::class,
        ]);
    }
}
