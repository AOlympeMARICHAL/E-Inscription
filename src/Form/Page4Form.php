<?php

namespace App\Form;

use App\Entity\Urgence;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Page4Form extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameDoctor', TextType::class, [
                'label'=> ' ',
                'required' => false,
            ])
            ->add('phoneDoctor', TelType::class,[
                'label'=> ' ',
                'required' => false,
            ])
            ->add('addressDoctor', TextType::class, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('dateVaccine', DateType::class, [
                'label' => ' ',
                'widget' => 'single_text',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Urgence::class,
        ]);
    }
}
