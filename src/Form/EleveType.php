<?php

namespace App\Form;

use App\Entity\Eleve;
use App\Entity\Financier;
use App\Entity\Individu;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('sexe', ChoiceType::class, [
                'label' => ' ',
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Féminin' => 'F',
                    'Masculin' => 'M'
                ],
                'attr' => [
                    'class' => 'fr-radio-rich',
                ],
                'choice_attr' => function ($choice, $key, $value) {
                    return [
                        'style' => 'display: none;',
                    ];
                }

            ])
            ->add('redoublement', CheckboxType::class, [
                'label' => 'Redoublement',
                'required' => false,
                'attr' => [
                    'class' => 'fr-checkbox-group',
                ]
            ])
            ->add('nationality')
            ->add('dateBirth', DateType::class, [
                'label' => ' ',
                'widget' => 'single_text',
            ])
            ->add('departmentBirth')
            ->add('gradeRepetition')
            ->add('regime')
            ->add('transport', ChoiceType::class, [
                'label' => ' ',
                'expanded' => true, 
                'multiple' => true,
                'choices' => [
                    'Filibus' => 'filibus',
                    'SNCF' => 'sncf',
                    'Autres' => 'autres',
                ],
                'attr' => [
                'class' => 'fr-checkbox-group',
                ]

                ])
            ->add('immaVehicle')
            ->add('speciality', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'class' => 'fr-input'
                ],
            ])
            ->add('lv1', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'class' => 'fr-input'
                ],
            ])
            ->add('lv2', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'class' => 'fr-input'
                ],
            ])
            ->add('mdl', ChoiceType::class, [
                'label' => ' ',
                'expanded' => true, 
                'multiple' => false,
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0,
                ],
                'attr' => [
                    'class' => 'fr-radio-rich',
                ],
                'choice_attr' => function ($choice, $key, $value) {
                return [
                    'class' => 'fr-radio-group',
                    'id' => 'img-' . strtolower($value),
                ];
            }
            ])
            ->add('copyright', ChoiceType::class, [
                'label' => ' ',
                'expanded' => true, 
                'multiple' => false,
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0,
                ],
                'attr' => [
                    'class' => 'fr-radio-rich',
                ],
                'choice_attr' => function ($choice, $key, $value) {
                return [
                    'class' => 'fr-radio-group',
                    'id' => 'img-' . strtolower($value),
                ];
            }
            ])
            ->add('bachelor')
            ->add('vitalCard')
            ->add('idCertificate')
            ->add('assurance')
            ->add('cours', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'class' => 'fr-input'
                ],
            ])
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
