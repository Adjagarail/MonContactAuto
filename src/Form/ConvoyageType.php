<?php

namespace App\Form;

use App\Entity\Convoyage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConvoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choice = [
            'oui' => 'oui',
            'non' => 'non'
        ];
        $builder

            ->add('nom', TextType::class, [
                'label' => 'Nom:'
            ])
            ->add('prenom',TextType::class,[
                'label' => 'Prénom:'
            ])
            ->add('marque',TextType::class,[
                'label' => 'Marque et modèle:'
            ])

            ->add('villed',TextType::class,[
                'label' => 'Ville de départ:'
            ])

            ->add('villea', TextType::class,[
                'label' => "Ville d'arrivée"
            ])
            ->add('calendrierAt',DateType::class, [
                'label' => 'Date souhaitée:'
            ])
            ->add('flexible',ChoiceType::class, [
                'choices' => $choice,
                'expanded' => true,
                'required' => true,
                'data' => 'non',
                'label' => 'Date flexible:'
            ])
            ->add('telephone',TextType::class,[
                'label' => 'Numéro de téléphone:'
            ])
            /*->add('marque',TextType::class, [
                'label' => 'Marques de la véhicule:'
            ])
            ->add('modele')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Convoyage::class,
        ]);
    }
}
