<?php

namespace App\Form;

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
                'label' => 'Numéro Téléphone:'
            ])
            ->add('mail', EmailType::class, [
                'label' => 'Email:'
            ])
            ->add('marque',TextType::class,[
                'label' => 'Marque de la voiture:'
            ])
            ->add('modele', TextType::class,[
                'label' => 'Modèle de la voiture:'
            ])
            ->add('years', NumberType::class,[
                'label' => 'Année de la voiture:'
            ])
            ->add('km', NumberType::class,[
                'label' => 'Kilomètrage:'
            ])
            ->add('couleur')
            ->add('options', EntityType::class, [
                'label' => 'Options de la voiture:',
                'required' => false,
                'class' => Option::class,
                'expanded' => true,
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
