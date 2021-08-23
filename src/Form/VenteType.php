<?php

namespace App\Form;

use App\Entity\Vvente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VenteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marques')
            ->add('nom')
            ->add('prenom')
            ->add('numero')
            ->add('called')
            ->add('ville')
            ->add('demande')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vvente::class,
        ]);
    }
}
