<?php


namespace App\Form;
use App\Data\SearchData;
use App\Entity\Marques;
use App\Entity\Typevehicule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SearchForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typevehicule', EntityType::class, [
                'class' => Typevehicule::class,
                'placeholder' => 'Type de véhicule',
                'mapped' => true,
                'expanded' => false,
                'label' => false
            ])
            ->add('marques', EntityType::class, [
                'class' => Marques::class,
                'placeholder' => 'Marque de la voiture',
                'mapped' => true,
                'expanded' => false,
                'label' => false
            ])
            ->add('max', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Km maximum'
                ]
            ])
            ->add('minYears', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Année minimum'
                ]
            ])



        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
}