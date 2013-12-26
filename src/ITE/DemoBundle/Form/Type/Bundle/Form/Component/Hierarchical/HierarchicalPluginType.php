<?php

namespace ITE\DemoBundle\Form\Type\Bundle\Form\Component\Hierarchical;

use ITE\DemoBundle\Form\ChoiceList\ChoiceListBuilder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class HierarchicalPluginType
 * @package ITE\DemoBundle\Form\Type\Bundle\Form\Component\Hierarchical
 */
class HierarchicalPluginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('root', 'choice', array(
                'choices' => ChoiceListBuilder::getChoicesByRange(1, 5),
            ))
            ->add('select2', 'ite_select2_choice', array(
                'attr' => array(
                    'class' => 'width100',
                ),
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_choice_value',
                ),
            ))
            ->add('tinymce', 'ite_tinymce_textarea', array(
                'plugin_options' => array(
                    'plugins' => array(),
                ),
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_text_value',
                ),
            ))
            ->add('knob', 'ite_knob_number', array(
                'plugin_options' => array(
                    'width' => 75,
                    'height' => 75,
                    'displayInput' => false,
                    'min' => 0,
                    'max' => 5,
                ),
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_text_value',
                ),
            ))
            ->add('bootstrap_spinedit', 'ite_bootstrap_spinedit_integer', array(
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_text_value',
                ),
            ))
            ->add('bootstrap_colorpicker', 'ite_bootstrap_colorpicker_text', array(
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_color_value',
                ),
            ))
            ->add('minicolors', 'ite_minicolors_text', array(
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_color_value',
                ),
            ))
            ->add('bootstrap_datetime', 'ite_bootstrap_datetimepicker_datetime', array(
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_datetime_value',
                ),
            ))
//            ->add('starrating', 'ite_starrating_rating', array(
//                'hierarchical' => array(
//                    'parents' => 'root',
//                    'route' => 'ite_demo_hierarchical_get_text_value',
//                ),
//            ))
//            ->add('leaf', 'textarea', array(
//                'attr' => array(
//                    'rows' => 5,
//                ),
//                'hierarchical' => array(
//                    'parents' => 'bootstrap_datetime',
//                    'route' => 'ite_demo_hierarchical_get_leaf_value',
//                ),
//            ))
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