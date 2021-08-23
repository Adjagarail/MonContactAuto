<?php

namespace App\Form;


use App\Data\VoitureData;
use App\Entity\Marques;
use App\Entity\Typevehicule;
use App\Repository\MarquesRepository;
use App\Repository\TypevehiculeRepository;
use phpDocumentor\Reflection\Types\AbstractList;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureDataType extends AbstractType
{



    public function buildForm(FormBuilderInterface $builder, array $options)
     {

       $choices = [
           'Vente' => 'Vente',
           'Location' => 'Location'
       ];
       $years = [
           2027 => 2027,
           2026 => 2026,
           2025 => 2025,
           2024 => 2024,
           2023 => 2023,
           2022 => 2022,
           2021 => 2021,
           2020 => 2020,
           2019 => 2019,
           2018 => 2018,
           2017 => 2017,
           2016 => 2016,
           2015 => 2015,
           2014 => 2014,
           2013 => 2013,
           2012 => 2012,
           2011 => 2011,
           2010 => 2010,
           2009 => 2009,
           2008 => 2008,
           2007 => 2007

       ];
         $carburant = [
             'Essence' => 'Essence',
             'Gasoil' => 'Gasoil'
         ];
         $transmission = [
             'Automatique' => 'Automatique',
             'Manuel' => 'Manuel'
         ];


       $builder
           ->add('destiner', ChoiceType::class, [
               'choices' => $choices,
               'expanded' => false,
               'placeholder' => 'Choisissez vente ou location',
               'label' => false
           ])
           ->add('typevehicule', EntityType::class, [
               'class' => Typevehicule::class,
               'placeholder' => 'Type de véhicule',
               'mapped' => true,
               'expanded' => false,
               'label' => false
           ])
           ->add('years', ChoiceType::class,[
               'choices' => $years,
               'expanded' => false,
               'placeholder' => 'Année de la voiture',
               'label' => false
           ])
           ->add('marques', EntityType::class, [
               'class' => Marques::class,
               'placeholder' => 'Marques',
               'mapped' => true,
               'label' => false
           ])

           ->add('carburant', ChoiceType::class,[
               'choices' => $carburant,
               'expanded' => false,
               'placeholder' => 'Carburant',
               'data' => 'Gasoil',
               'label' => false

           ])
           ->add('transmission', ChoiceType::class,[

               'choices' => $transmission,
               'expanded' => false,
               'data' => 'transmission',
               'placeholder' => 'Carburant',
               'label' => false
           ])
           ;
     }

     public function configureOptions(OptionsResolver $resolver)
     {
         $resolver->setDefaults([
             'data_class' => VoitureData::class,
         ]);
     }

}