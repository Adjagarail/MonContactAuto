<?php

namespace App\Form;

use App\Entity\Mail;
use App\Entity\Subscribe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('abonner', EntityType::class, [
                'label' => 'Email Abonner',
                'multiple' => true,
                'required' => true,
                'class' => Subscribe::class,
                'mapped' => true,
                "placeholder" => "email"
            ])
            ->add('object')
            ->add('message')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Mail::class,
        ]);
    }
}
