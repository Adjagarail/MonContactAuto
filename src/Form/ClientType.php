<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = [
            'La Journée' => 'Journée',
            'Le soir' => 'soirée'
        ];
        $choice = [
            'Toute la Journée' => 'Toute la Journée',
            'Le soir' => 'La soirée'
        ];

        $builder
            ->add('prenom')
            ->add('nom')
            ->add('telephone')
            ->add('mail')
            ->add('disponibiliter', ChoiceType::class, [
                'choices' => $choices,
                'expanded' => false,
                'required' => true,
                'label' => 'Disponible:'
            ])
            ->add('cdispo', TextType::class, [
                'label' => 'Commentaire sur votre disponibilité'
            ])
            ->add('rappel', ChoiceType::class, [
                'choices' => $choice,
                'expanded' => true,
                'label' => 'Me rappeler'
            ])
            ->add('rappelAt',DateTimeType::class,[
                'label' => 'Me rappeler',
                'attr' => ['id' => 'test'],
            ])
            ->add('ville')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
