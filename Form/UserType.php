<?php

namespace HotelBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /**
         * @param FormBuilderInterface $builder
         * @param array $options
         */
        $builder
            ->add('username',TextType::class)
            ->add('email',TextType::class)
            ->add('password',RepeatedType::class,[
                'type' =>PasswordType::class
            ])
            ->add('submit',SubmitType::class , [
                'attr' => ['class' => 'btn btn-success pull-right']
            ]);
    }
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HotelBundle\Entity\User'
        ));
    }


}
?>
