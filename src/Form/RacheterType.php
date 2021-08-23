<?php

namespace App\Form;

use App\Entity\Racheter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RacheterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque', TextType::class, [
                'label' => 'Marque de la voiture:'
            ])
            ->add('kilometrage', NumberType::class, [
                'label' => 'Kilométrage:'
            ])
            ->add('annes', NumberType::class, [

                'label' => 'Année de la voiture:'
            ])
            ->add('images', FileType::class,[
                'label' => 'Images de la voiture',
                'multiple' => true,
                'mapped' => false,
                'required' => false
            ])
            ->add('enpanne', NumberType::class, [
                'label' => 'Voiture en panne:'
            ])
            ->add('nom', TextType::class, [
                'label' => 'Votre Prénom et Nom:'
            ])
            ->add('telephone', NumberType::class, [
                'label' => ' Votre numéro de téléphone:'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Racheter::class,
        ]);
    }
}
