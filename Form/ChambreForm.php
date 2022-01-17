<?php


namespace HotelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class ChambreForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id',TextareaType::class)
            ->add('prix',TextareaType::class)
            ->add('disponibilite', TextareaType::class)
            ->add('typeChambre',TextareaType::class)
            ->add('nombreDeLit',TextareaType::class)
            ->add('numChambre', TextareaType::class)
          ;
    }
    public function getName()
    {
        return 'Chambre' ;
    }
}
