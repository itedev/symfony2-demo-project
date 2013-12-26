<?php

namespace ITE\DemoBundle\Form\Type\Bundle\Form\Plugin\Select2;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class Select2Type
 * @package ITE\DemoBundle\Form\Type\Bundle\Form\Plugin\Select2
 */
class Select2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('choice', 'ite_select2_choice', array(
                'attr' => array(
                    'class' => 'default-input-width',
                ),
            ))
            ->add('language', 'ite_select2_language', array(
                'attr' => array(
                    'class' => 'default-input-width',
                ),
            ))
            ->add('country', 'ite_select2_country', array(
                'attr' => array(
                    'class' => 'default-input-width',
                ),
            ))
            ->add('timezone', 'ite_select2_timezone', array(
                'attr' => array(
                    'class' => 'default-input-width',
                ),
            ))
            ->add('locale', 'ite_select2_locale', array(
                'attr' => array(
                    'class' => 'default-input-width',
                ),
            ))
            ->add('currency', 'ite_select2_currency', array(
                'attr' => array(
                    'class' => 'default-input-width',
                ),
            ))
//            ->add('entity', 'ite_select2_entity', array(
//                'attr' => array(
//                    'class' => 'default-input-width',
//                ),
//            ))
//            ->add('document', 'ite_select2_document', array(
//                'attr' => array(
////                    'class' => 'default-input-width',
//                ),
//            ))
//            ->add('model', 'ite_select2_model', array(
//                'attr' => array(
////                    'class' => 'default-input-width',
//                ),
//            ))
            ->add('google_font', 'ite_select2_google_font', array(
                'attr' => array(
                    'class' => 'default-input-width',
                ),
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'attr' => array(
                'class' => 'form-horizontal',
            ),
        ));
    }

    public function getName()
    {
        return 'form';
    }
}