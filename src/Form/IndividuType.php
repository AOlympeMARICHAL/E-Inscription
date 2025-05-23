<?php

namespace App\Form;

use App\Entity\Financier;
use App\Entity\Individu;
use App\Entity\Responsable;
use App\Entity\Urgence;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IndividuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label'=> ' ',
                'required' => false,
            ])
            ->add('lastname', TextType::class, [
                'label'=> ' ',
                'required' => false,
            ])
            ->add('email', EmailType::class, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('mobilePhone', TelType::class,[
                'label'=> ' ',
                'required' => false,
            ])
            ->add('address', TextType::class, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('zip', TextType::class, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('city', TextType::class, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('commune', TextType::class, [
                'label' => ' ',
                'required' => false,
            ])

            ->add('nameBoss', TextType::class, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('addressBoss', TextType::class, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('financier', EntityType::class, [
                'label' => ' ',
                'class' => Financier::class,
                'choice_label' => 'id',
                'required' => false,
            ])
            ->add('responsable', EntityType::class, [
                'label' => ' ',
                'class' => Responsable::class,
                'choice_label' => 'id',
                'required' => false,
            ])
            ->add('urgence', EntityType::class, [
                'label' => ' ',
                'class' => Urgence::class,
                'choice_label' => 'id',
                'required' => false,
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
