<?php

namespace App\Form;

use App\Entity\Transport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransportType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choice = [
            'oui' => 'oui',
            'non' => 'non'
        ];
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom:',
                'required' => false
            ])
            ->add('prenom',TextType::class, [
                'label' => 'Prénom:',
                'required' => false
            ])
            ->add('telephone',NumberType::class, [
                'label' => 'Téléphone:',
                'required' => false
            ])

            ->add('mail', EmailType::class,[
                'label' => 'Email:',
                'required' => false
            ])
            ->add('villed',TextType::class,[
                'label' => 'Ville de départ:',
                'required' => false
            ])
            ->add('villea',TextType::class,[
                'label' => "Ville d'arrivée:",
                'required' => false
            ])
            ->add('deposerAt',DateTimeType::class,[
                'label' => 'Date et heure de disponibilité:'
            ])
            ->add('nombrepersonne', TextType::class, [
                'label' => 'Nombre de personne:'
            ])
            ->add('dateflexible',ChoiceType::class, [
                'choices' => $choice,
                'expanded' => true,
                'required' => true,
                'data' => 'non',
                'label' => 'Date flexible:'])
            ->add('bagage',ChoiceType::class, [
        'choices' => $choice,
        'expanded' => true,
        'required' => true,
        'data' => 'non',
        'label' => 'Bagage'
    ])
            ->add('descriptionbagage',TextareaType::class, [
                'label' => 'Description bagage:'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transport::class,
        ]);
    }
}
