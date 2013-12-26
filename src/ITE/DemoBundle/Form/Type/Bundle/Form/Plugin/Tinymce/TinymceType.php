<?php

namespace ITE\DemoBundle\Form\Type\Bundle\Form\Plugin\Tinymce;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class TinymceType
 * @package ITE\DemoBundle\Form\Type\Bundle\Form\Plugin\Select2
 */
class TinymceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('textarea', 'ite_tinymce_textarea', array(
                'attr' => array(
                    'class' => 'default-input-width',
                ),
                'horizontal' => false,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'attr' => array(
//                'class' => 'form-horizontal',
            ),
        ));
    }

    public function getName()
    {
        return 'form';
    }
}