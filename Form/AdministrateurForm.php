<?php


namespace HotelBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class AdministrateurForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom',TextareaType::class)
            ->add('Prenom',TextareaType::class)
            ->add('Fonction', TextareaType::class)
            ->add('Sexe',TextareaType::class)
            ->add('Service',TextareaType::class)
            ->add('Tel',TextareaType::class)
            ->add('Email', TextareaType::class) ;
    }
    public function getName()
    {
        return 'Administrateur' ;
    }
}
