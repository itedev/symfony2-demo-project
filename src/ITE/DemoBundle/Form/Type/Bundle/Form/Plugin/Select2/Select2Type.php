<?php

namespace ITE\DemoBundle\Form\Type\Bundle\Form\Plugin\Select2;

use ITE\DemoBundle\Form\ChoiceList\ChoiceListBuilder;
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
            ->add('choice', 'ite_select2_choice', [
                'choices' => ChoiceListBuilder::getChoicesByRange(1, 10),
                'attr' => [
                    'class' => 'default-input-width',
                ],
            ])
            ->add('choice', 'ite_select2_entity', [
                'class' => 'ITEDemoBundle:Number',
                'attr' => [
                    'class' => 'default-input-width',
                ],
            ])
            ->add('language', 'ite_select2_language', [
                'attr' => [
                    'class' => 'default-input-width',
                ],
            ])
            ->add('country', 'ite_select2_country', [
                'attr' => [
                    'class' => 'default-input-width',
                ],
            ])
            ->add('timezone', 'ite_select2_timezone', [
                'attr' => [
                    'class' => 'default-input-width',
                ],
            ])
            ->add('locale', 'ite_select2_locale', [
                'attr' => [
                    'class' => 'default-input-width',
                ],
            ])
            ->add('currency', 'ite_select2_currency', [
                'attr' => [
                    'class' => 'default-input-width',
                ],
            ])
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
            ->add('google_font', 'ite_select2_google_font', [
                'attr' => [
                    'class' => 'default-input-width',
                ],
            ])
//            ->add('ajax_entity', 'ite_select2_ajax_entity', [
//                'class' => 'ITEDemoBundle:Number',
//                'attr' => [
//                    'class' => 'default-input-width',
//                ],
//            ])
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