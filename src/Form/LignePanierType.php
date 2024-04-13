<?php

namespace App\Form;

use App\Entity\LignePanier;
use App\Entity\Panier;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LignePanierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Quantite')
            ->add('Num_Produit', EntityType::class, [
                'class' => Produit::class,
                'choice_label' => 'id',
            ])
            ->add('Num_Panier', EntityType::class, [
                'class' => Panier::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LignePanier::class,
        ]);
    }
}
