<?php

namespace App\Form;

use App\Entity\Expertise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExpertiseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class, [
                'label' => 'Nom:'
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom:'
            ])
            ->add('adressev',TextType::class, [
                'label' => 'Adresse:'
            ])
            ->add('telephonec',TextType::class, [
                'label' => 'Téléphone:'
            ])
            ->add('prenomnomvendeur',TextType::class, [
                'label' => 'Nom et Prénom:'
            ])
            ->add('telephonev',TextType::class, [
                'label' => 'Télépĥone:'
            ])
            ->add('modele',TextType::class, [
                'label' => 'Marque et Modèle :'
            ])

            ->add('lien',TextType::class, [
                'label' => 'Lien annonce:'
            ])

            ->add('infos',TextareaType::class, [
                'label' => 'Info supplémentaire'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Expertise::class,
        ]);
    }
}
