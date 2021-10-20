<?php

namespace App\Form;

use App\Entity\Destiner;
use App\Entity\Marques;
use App\Entity\Modele;
use App\Entity\Option;
use App\Entity\Typevehicule;
use App\Entity\Voiture;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = [
            'Vente' => 'vente',
            'Location' => 'location'
        ];
        $transmission = [
          'Automatique' => 'Automatique',
          'Manuel' => 'Manuel'
        ];
        $dispo = [
            'disponible' => 'disponible',
            'non disponible' => 'non disponible'
        ];
        $vendus = [
            'voiture vendu' => 'voiture vendu',
            'non vendu' => 'non vendu'
        ];
        $location = [
            'Voiture louer' => 'Voiture louer',
            'Voiture non louer' => 'Voiture non louer'
        ];
        $carburant = [
            'Essence' => 'Essence',
            'Gasoil' => 'Gasoil'
        ];

        $builder
            ->add('destiner', ChoiceType::class, [
                'choices' => $choices,
                'expanded' => false,
                'label' => 'Voiture destinée:',
                'data' => 'location',
                'mapped' => true
            ])
            ->add('typevehicule', EntityType::class, [
                'class' => Typevehicule::class,
                'placeholder' => 'Type de véhicule',
                'label' => 'Type de véhicule',
                'mapped' => true
            ])
            ->add('disponible', ChoiceType::class, [
                'choices' => $dispo,
                'expanded' => false,
                'label' => 'Disponibilité de la voiture:',
                'data' => 'location',
                'required' => true,
                'mapped' => true
            ])
            ->add('marques', EntityType::class, [
                'class' => Marques::class,
                'label' => 'Marques de la voitures',
                'placeholder' => 'Marques',
                'mapped' => true
            ])
            ->add('options', EntityType::class, [
                'class' => Option::class,
                'multiple' => true,
                'expanded' => true,
                'label' => 'Options de la véhicule',
                'mapped' => true
            ])
            ->add('modeles', EntityType::class, [
                'class' => Modele::class,
                'multiple' => true,
                'expanded' => true,
                'label' => 'Modèle de la véhicule',
                'mapped' => true
            ])


            ->add('transmission',ChoiceType::class, [
                'choices' => $transmission,
                'expanded' => false,
                'label' => 'Transmission:',
                'data' => 'transmission',
                'required' => true
            ] )
            ->add('place', NumberType::class, [
                'label' => 'Nombre de place'

            ])
            ->add('prix', NumberType::class, [
                'label' => 'Prix',
                'required' => false
            ])
            ->add('carburant', ChoiceType::class,[
                'choices' => $carburant,
                'expanded' => false,
                'data' => 'Gasoil'
            ])
            ->add('villeL', TextType::class, [
                'label' => 'Ville',
                'required' => false
            ])
            ->add('tarif', TextType::class, [
                'label' => 'Tarif journalière',
                'required' => false
            ])
            ->add('tarifs', TextType::class, [
                'label' => 'Tarif mensuel',
                'required' => false
            ])
            ->add('dispoAt', DateType::class,[
                'widget' => 'single_text',
                'attr' => ["data-provide" => "datepicker"],
                'html5' => false,
                'format' => 'yyyy-MM-dd',
                'label' => 'Disponible du:',
                'required' => false,
                'mapped' => true
            ])
             ->add('disposAt', DateTimeType::class,[
                'data'   => new \DateTime(),
                 'widget' => 'single_text',
                'label' => 'Au:',
                'required' => false,
                 'mapped' => true
            ])

            ->add('kilometrages')
            ->add('images', FileType::class,[
                'label' => 'Photos voitures',
                'multiple' => true,
                'mapped' => false,
                'required' => false,
            ])

            ->add('years', NumberType::class, [
                'label' => 'Année de la voiture:'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
