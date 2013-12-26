<?php

namespace ITE\DemoBundle\Form\Type\Bundle\Form\Component\Hierarchical;

use ITE\DemoBundle\Form\ChoiceList\ChoiceListBuilder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class HierarchicalType
 * @package ITE\DemoBundle\Form\Type\Bundle\Form\Component\Hierarchical
 */
class HierarchicalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $simpleTab = $builder
            ->create('simple', 'tab', array(
                'label' => 'Simple',
            ))
            ->add('simple', new HierarchicalSimpleType(), array(
                'label_render' => false,
                'widget_form_group' => false,
            ))
        ;

        $pluginTab = $builder
            ->create('plugin', 'tab', array(
                'label' => 'Plugin',
            ))
            ->add('plugin', new HierarchicalPluginType(), array(
                'label_render' => false,
                'widget_form_group' => false,
            ))
        ;

        $collectionTab = $builder
            ->create('collection', 'tab', array(
                'label' => 'Collection',
            ))
            ->add('collectionItems', 'collection', array(
                'type' => new HierarchicalCollectionType(),
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'options' => array(
                    'label_render' => false,
                    'widget_form_group' => false,
                    'widget_remove_btn' => false,
                ),
                'widget_items_attr' => array(
                    'class' => 'row margin-bottom-10px',
                ),
            ))
        ;

        $extendedTab = $builder
            ->create('extended', 'tab', array(
                'label' => 'Extended',
            ))
            ->add('a', 'choice', array(
                'choices' => ChoiceListBuilder::getChoicesByRange(1, 5),
            ))
            ->add('b', 'text', array(

            ))
            ->add('c', 'text', array(
                'help_block' => 'Depends on a.',
                'hierarchical' => array(
                    'parents' => 'a',
                    'route' => 'ite_demo_hierarchical_get_text_value',
                    'route_parameters' => array(
                        'name' => 'a',
                    ),
                ),
            ))
            ->add('d', 'choice', array(
                'help_block' => 'Depends on a.',
                'hierarchical' => array(
                    'parents' => 'a',
                    'route' => 'ite_demo_hierarchical_get_choice_value',
                    'route_parameters' => array(
                        'name' => 'a',
                    ),
                ),
            ))
            ->add('e', 'text', array(
                'help_block' => 'Depends on b and d.',
                'hierarchical' => array(
                    'parents' => array('b', 'd'),
                    'callback' => 'getEValue',
                ),
            ))
        ;

        $builder
            ->add($simpleTab)
            ->add($pluginTab)
            ->add($collectionTab)
            ->add($extendedTab)
            ->add('save', 'submit', array(
                'attr' => array(
                    'class' => 'btn-primary',
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