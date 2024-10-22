<?php

namespace App\Form;

use App\Entity\Purchase;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CartConfirmationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName' , TextType::class, [
                'label' => 'Nom Complet',
                'attr' => [
                    'placeholder' => 'Nom complet pour la livraison'
                ]
            ])
            ->add('address' , TextareaType::class, [
                'label' => 'Adresse complète',
                'attr' => [
                    'placeholder' => 'Adresse complète pour la livraison'
                ]
            ])
            ->add('postalCode' , TextType::class, [
                'label' => 'Code Postal',
                'attr' => [
                    'placeholder' => 'Code Postal pour la livraison'
                ]
            ])
            ->add('city' , TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'placeholder' =>  'Ville pour la livraison'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([

            'data_class' => Purchase::class
        ]);
    }
}
