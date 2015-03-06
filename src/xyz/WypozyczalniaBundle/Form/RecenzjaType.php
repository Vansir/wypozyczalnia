<?php

namespace xyz\WypozyczalniaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RecenzjaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tekst', 'textarea', array(
                'label' => false,
                'attr'  =>  array(
                    'class' => 'form-control'
                )))
            ->add('Zapisz', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-default'
                )))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'xyz\WypozyczalniaBundle\Entity\Recenzja'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'xyz_wypozyczalniabundle_recenzja';
    }
}
