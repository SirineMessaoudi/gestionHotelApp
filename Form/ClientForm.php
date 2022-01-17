<?php


namespace HotelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class ClientForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom',TextareaType::class)
            ->add('Prenom',TextareaType::class)
            ->add('Adresse', TextareaType::class)
            ->add('Ville',TextareaType::class)
            ->add('Code_Postal',TextareaType::class)
            ->add('Pays', TextareaType::class)
            ->add('Tel',TextareaType::class)
            ->add('Email', TextareaType::class) ;
    }
    public function getName()
    {
        return 'Client' ;
    }
}
