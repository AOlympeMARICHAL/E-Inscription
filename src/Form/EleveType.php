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
            ->add('INE', TextType::class, [
                'label' => ' ',
            ])
            ->add('secu', null, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('dateEntree', null, [
                'label' => ' ',
                'widget' => 'single_text',
                'required' => false,
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
            ->add('gradeRepetition', CheckboxType::class, [
                'label' => 'Redoublement',
                'required' => false,
                'attr' => [
                    'class' => 'fr-checkbox-group',
                ]
            ])
            ->add('nationality', TextType::class, [
                'label' => ' '
            ])
            ->add('dateBirth', DateType::class, [
                'label' => ' ',
                'widget' => 'single_text',
            ])
            ->add('departmentBirth', TextType::class, [
                'label' => ' '
            ])
            ->add('regime', null, [
                'label' => ' ',
                'required' => false,
            ])
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
            ->add('immaVehicle', null, [
                'label' => ' ',
                'required' => false,
            ])
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
            ->add('bachelor', null, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('vitalCard', null, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('idCertificate', null, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('assurance', null, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('cours', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'class' => 'fr-input'
                ],
            ])
            ->add('financier', EntityType::class, [
                'class' => Financier::class,
                'choice_label' => 'id',
                'label' => ' ',
                'required' => false,
            ])
            ->add('individu', EntityType::class, [
                'class' => Individu::class,
                'choice_label' => 'id',
                'label' => ' ',
                'required' => false,
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
