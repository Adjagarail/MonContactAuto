<?php


namespace App\Form;
use App\Data\LocationData;
use App\Entity\Marques;
use App\Entity\Typevehicule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SearchLocation extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choice = [
            'Paris' => 'Paris',
            'Montpellier' => 'Montpellier',
            'Autre' => 'Autre',
        ];
        $builder
            ->add('dispoAt', DateType::class,[
                'data'   => new \DateTime(),
                'widget' => 'single_text',
                'required' => false,
                'label' => 'Disponible du:',
                'attr'   => ['min' => ( new \DateTime() )->format('d-m-Y')]
            ])
            ->add('disposAt', DateType::class,[
                'data'   => new \DateTime(),
                'widget' => 'single_text',
                'required' => false,
                'label' => 'Au:',
                'attr'   => ['min' => ( new \DateTime() )->format('d-m-Y')]
            ])
            ->add('ville', ChoiceType::class, [
                'choices' => $choice,
                'expanded' => false,
                'label' => 'Ville:',
                'placeholder' => 'Ville',
                'data' => '',
                'required' => false
            ])
            ->add('autreville', TextType::class, [
                'label' => 'Autre Ville:',
                'required' => false
            ])
            ->add('mintarif', NumberType::class, [
                'label' => 'tarif min:',
                'required' => false
            ])
            ->add('maxtarif', NumberType::class, [
                'label' => 'tarif max:',
                'required' => false
            ])

        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LocationData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
}