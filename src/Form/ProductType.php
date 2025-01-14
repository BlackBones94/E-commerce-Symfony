<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use App\Form\DataTransformer\CentimesTransformer;
use App\Form\Type\PriceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du produit',
                'attr'  => [
                    'placeholder' => 'Tapez le nom du produit'
                ],
                'required' => false,
            ])
            ->add('shortDescription', TextareaType::class, [
                'label' => 'Description courte',
                'attr'  =>  [
                    'placeholder' => 'Tapez la description du produit'
                ]
            ])

            ->add('price', MoneyType::class, [
                'label' => 'Prix du produit ',
                'attr'  => [
                    'placeholder' => 'Tapez le prix du produit en €'
                ],
                'divisor' => 100
            ])

            ->add('mainPicture', UrlType::class, [
                'label' => 'image du produit',
                'attr' => ['placeholder' => 'Tapez une URL d\'image !']
            ])


            ->add('category', EntityType::class, [
                'label' => 'Catégorie',
                'placeholder' => '-- Choisir une catégorie --',
                'class' => Category::class,
                'choice_label' => function (Category $category) {
                    return strtoupper($category->getName());
                }
            ]);

        // $builder->get('price')->addModelTransformer(new CentimesTransformer);

        // $builder->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event){
        //     $product = $event->getData();

        //     if($product->getPrice() !== null){
        //         $product->setPrice($product->getPrice() * 100);
        //     }
        // });  

        // $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
        //     $form = $event->getForm();

        //     /** @var Product */
        //     $product = $event->getData();

        //     if($product->getPrice() !== null){
        //     $product->setPrice($product->getPrice() / 100);
        //     }
        // });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
