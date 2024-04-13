<?php

namespace App\Form;

use App\Entity\Commande;
use App\Entity\Panier;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Num_Commande')
            ->add('Valide')
            ->add('Date', null, [
                'widget' => 'single_text',
            ])
            ->add('Identifiant_user', EntityType::class, [
                'class' => User::class,
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
            'data_class' => Commande::class,
        ]);
    }
}
