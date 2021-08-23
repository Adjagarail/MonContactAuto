<?php

namespace App\Form;

use App\Entity\Info;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('message')
            ->add('images', FileType::class,[
                'label' => 'Photos voitures',
                'multiple' => true,
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Photos voitures'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Info::class,
        ]);
    }
}
