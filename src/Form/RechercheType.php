<?php

namespace App\Form;

use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Option;
use App\Entity\Recherche;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $options = [
            'clim' => 'clim',
            'gps' => 'gps',
            'jantes alu' => 'jantes alu',
            'caméra de recul' => 'caméra de recul',
            'radar de recul' => 'radar de recul',
            'toit ouvrant' => 'toit ouvrant',
            'régulateur de vitesse' => 'régulateur de vitesse',
            'fonction Bluetooth' => 'fonction Bluetooth'
        ];
        $builder
            ->add('nom',TextType::class, [
                'label' => 'Nom:'
            ])
            ->add('prenom',TextType::class,[
                'label' => 'Prénom:'
            ])
            ->add('ville',TextType::class,[
                'label' => 'Ville:'
            ])
            ->add('numero',NumberType::class,[
                'label' => 'Numéro de Téléphone:'
            ])
            ->add('mail', EmailType::class, [
                'label' => 'Email:'
            ])
            ->add('marques', EntityType::class, [
                'label' => 'Marques désirées:',
                'required' => false,
                'class' => Marque::class,
                'expanded' => false,
                'multiple' => true,
            ])

            ->add('modele', EntityType::class, [
                'label' => 'Modèles désirées:',
                'required' => false,
                'class' => Modele::class,
                'expanded' => false,
                'multiple' => true,
            ])
            ->add('years', NumberType::class,[
                'label' => 'Année minimum:'
            ])
            ->add('km', NumberType::class,[
                'label' => 'Kilomètrage maximum:'
            ])
            ->add('couleur', TextType::class,[
                'label' => 'Couleurs désirées'
            ])
            ->add('options', EntityType::class, [
                'label' => 'Options Exigées:',
                'required' => false,
                'class' => Option::class,
                'expanded' => false,
                'multiple' => true
            ])
            ->add('budget',NumberType::class,[
                'label' => 'Budget:'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recherche::class,
        ]);
    }
}
