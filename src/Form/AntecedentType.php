<?php

namespace App\Form;

use App\Entity\Antecedent;
use App\Entity\Eleve;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AntecedentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('annee', TextType::class, [
            'label' => 'Année',
            'required' => false
        ])

            ->add('classe', TextType::class,[
                'label' => 'Classe',
                'attr' => [
                    'placeholder' => 'Classe',
                ],

            ])
            ->add('lv1',TextType::class,[
                'label' => 'LV1',
                'attr' => [
                    'placeholder' => 'LV1',
                ],

            ])
            ->add('lv2' ,TextType::class,[
                'label' => 'LV2',
                'attr' => [
                    'placeholder' => 'LV2',
                ],

            ])
            ->add('option',TextType::class,[
                'label' => 'Option',
                'attr' => [
                    'placeholder' => 'Option',
                ],

            ])
            ->add('school', TextType::class, [
                'label' => 'Etablissement',
                'attr' => [
                    'placeholder' => 'Etablissement',
                ],
            ])
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
