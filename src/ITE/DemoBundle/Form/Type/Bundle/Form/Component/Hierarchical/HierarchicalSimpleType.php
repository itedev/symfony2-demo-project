<?php

namespace ITE\DemoBundle\Form\Type\Bundle\Form\Component\Hierarchical;

use ITE\DemoBundle\Form\ChoiceList\ChoiceListBuilder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class HierarchicalSimpleType
 * @package ITE\DemoBundle\Form\Type\Bundle\Form\Component\Hierarchical
 */
class HierarchicalSimpleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('root', 'choice', array(
                'choices' => ChoiceListBuilder::getChoicesByRange(1, 5),
            ))
            ->add('text', 'text', array(
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_text_value',
                ),
            ))
            ->add('textarea', 'textarea', array(
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_text_value',
                ),
            ))
            ->add('selectChoice', 'choice', array(
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_choice_value',
                ),
            ))
            ->add('multipleSelectChoice', 'choice', array(
                'multiple' => true,
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_choice_value',
                ),
            ))
            ->add('radioChoice', 'choice', array(
                'expanded' => true,
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_expanded_choice_value',
                ),
            ))
            ->add('checkboxChoice', 'choice', array(
                'expanded' => true,
                'multiple' => true,
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_expanded_choice_value',
                ),
            ))
            ->add('selectEntity', 'entity', array(
                'class' => 'ITEDemoBundle:Number',
                'choices' => array(),
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_entity_value',
                ),
            ))
            ->add('multipleSelectEntity', 'entity', array(
                'class' => 'ITEDemoBundle:Number',
                'choices' => array(),
                'multiple' => true,
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_entity_value',
                ),
            ))
            ->add('radioEntity', 'entity', array(
                'class' => 'ITEDemoBundle:Number',
                'choices' => array(),
                'expanded' => true,
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_expanded_entity_value',
                ),
            ))
            ->add('checkboxEntity', 'entity', array(
                'class' => 'ITEDemoBundle:Number',
                'choices' => array(),
                'expanded' => true,
                'multiple' => true,
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_expanded_entity_value',
                ),
            ))
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