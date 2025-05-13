<?php

namespace App\Form;

use App\Entity\Urgence;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
class UrgenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateVaccine', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('observation',TextType::class, [
                'label' => 'Observation',
                'attr' => [
                    'placeholder' => 'Entrez une observation',
                ],
            ])
            ->add('nameDoctor', TextType::class, [
                'label' => 'Nom du médecin',
                'attr' => [
                    'placeholder' => 'Entrez le nom du médecin',
                ],
            ])
            ->add('addressDoctor', TextType::class, [
                'label' => 'Adresse du médecin',
                'attr' => [
                    'placeholder' => 'Entrez l\'adresse du médecin',
                ],
            ])
            ->add('phoneDoctor', TextType::class, [
                'label' => 'Téléphone du médecin',
                'attr' => [
                    'placeholder' => 'Entrez le téléphone du médecin',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Urgence::class,
        ]);
    }
}
