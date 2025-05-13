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
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Classe',
                ],
                'required' => false
 
            ])
            ->add('lv1',TextType::class,[
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'LV1',
                ],
                'required' => false
 
            ])
            ->add('lv2' ,TextType::class,[
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'LV2',
                ],
                'required' => false
 
            ])
            ->add('option',TextType::class,[
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Option',
                ],
                'required' => false
 
            ])
            ->add('school', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Etablissement',
                ],
                'required' => false
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