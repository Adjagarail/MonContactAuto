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
            ->add('prenom', TextType::class, [
                'label' => 'Prénom'
            ])
            ->add('nom',TextType::class, [
                'label' => 'Nom'
            ])
            ->add('telephonec',TextType::class, [
                'label' => 'Votre téléphone'
            ])
            ->add('prenomnomvendeur',TextType::class, [
                'label' => 'Prénom et nom vendeur'
            ])
            ->add('telephonev',TextType::class, [
                'label' => 'Téléĥone vendeur'
            ])
            ->add('lien',TextType::class, [
                'label' => 'Lien annonce'
            ])
            ->add('adressev',TextType::class, [
                'label' => 'Adresse vendeur'
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
