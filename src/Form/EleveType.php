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
           
            ->add('dateEntree', null, [
                'label' => ' ',
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('sexe', ChoiceType::class, [
                'label' => ' ',
                'expanded' => true,
                'multiple' => false,
                'required' => false,
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
                'label' => ' ',
                'required' => false,
            ])
            ->add('dateBirth', DateType::class, [
                'label' => ' ',
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('departmentBirth', TextType::class, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('regime', null, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('sexe', ChoiceType::class, array(
                'label' => 'Sexe',  
                'expanded' => true,
                'multiple' => false,
                'required' => true,
                'choices' => [
                    'Féminin' => 'F',
                    'Masculin' => 'M',
                ],
                'attr' => [
                    'class' => 'fr-radio-group',
                ],
                'choice_attr' => function ($choice, $key, $value) {
                    return [
                        'class' => 'fr-radio-rich',
                    ];
                }
            ))
 
            ->add('transport', ChoiceType::class, [
                'label' => ' ',
                'expanded' => true,
                'multiple' => true,
                'required' => false,
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
                'required' => false,
                'attr' => [
                    'class' => 'fr-input'
                ],
            ])
            ->add('lv1', TextType::class, [
                'label' => ' ',
                'required' => false,
                'attr' => [
                    'class' => 'fr-input'
                ],
            ])
            ->add('lv2', TextType::class, [
                'label' => ' ',
                'required' => false,
                'attr' => [
                    'class' => 'fr-input'
                ],
            ])
            ->add('mdl', ChoiceType::class, [
                'label' => 'Souhaitez-vous être membre de la MDL ?',
                'required' => true,
                'label_attr' => [
                    'class' => 'fr-text--bold'
                ],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0,
                ],
                'attr' => [
                    'class' => 'fr-radio-group',
                ],
                'choice_attr' => function ($choice, $key, $value) {
                    return [
                        'class' => 'fr-radio-rich',
                    ];
                },
                'help' => 'Si oui, le jour de la rentrée, vous devez fournir un chèque de 10€ au nom de la MDL',
                'help_attr' => [
                    'class' => 'fr-hint-text'
                ]
            ])
            ->add('copyright', ChoiceType::class, [
                'label' => 'Souhaitez-vous garder votre droit à l\'image ?',
                'label_attr' => [
                    'class' => 'fr-text--bold'
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => true,
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0,
                ],
                'attr' => [
                    'class' => 'fr-radio-group',
                ],
                'choice_attr' => function ($choice, $key, $value) {
                    return [
                        'class' => 'fr-radio-rich',
                    ];
                },
                'help' => 'Si oui, vous n\'apparaîtrez sur aucune photo de l\'établissement',
                'help_attr' => [
                    'class' => 'fr-hint-text'
                ]
            ])
            ->add('bachelor', null, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('vitalCard', null, [ //carte vitale (document)
                'label' => ' ',
                'required' => false,
            ])
            ->add('idCertificate', null, [ //carte d'identité (document)
                'label' => ' ',
                'required' => false,
            ])
            ->add('assurance', null, [ //assurance (document)
                'label' => ' ',
                'required' => false,
            ])
            ->add('cours', TextType::class, [
                'label' => ' ',
                'required' => false,
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
 