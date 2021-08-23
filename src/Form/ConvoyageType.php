<?php

namespace App\Form;

use App\Entity\Convoyage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConvoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('villed')
            ->add('villea')
            ->add('calendrierAt')
            ->add('telephone')
            ->add('marque')
            ->add('modele')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Convoyage::class,
        ]);
    }
}
