<?php

namespace ITE\DemoBundle\Form\Type\Bundle\Form\Component\Collection;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class CollectionType
 * @package ITE\DemoBundle\Form\Type\Bundle\Form\Component\Collection
 */
class CollectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('simpleItems', 'collection', array(
                'label' => 'Simple collection',
                'type' => 'email',
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'options' => array(
                    'label_render' => false,
                    'widget_addon_prepend' => array(
                        'text' => '@',
                    ),
//                    'widget_form_group' => false,
                    'horizontal_input_wrapper_class' => 'col-lg-5',
                ),
                'widget_items_attr' => array(
                    'class' => 'row',
                ),
                'horizontal' => false,
            ))
            ->add('extendedItems', 'collection', array(
                'label' => 'Extended collection with table layout and plugins',
                'type' => new CollectionLevel2Type(),
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'collection_item_tag' => 'tr',
                'horizontal' => false,
            ))
            ->add('eventItems', 'collection', array(
                'label' => 'Collection with events and animation',
                'type' => 'email',
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'options' => array(
                    'label_render' => false,
                    'widget_addon_prepend' => array(
                        'text' => '@',
                    ),
                    'horizontal_input_wrapper_class' => 'col-lg-5',
                ),
                'widget_items_attr' => array(
                    'class' => 'row',
                ),
                'horizontal' => false,
                'widget_show_animation' => array(
                    'type' => 'fade',
                    'length' => 200,
                ),
                'widget_hide_animation' => array(
                    'type' => 'slide',
                    'length' => 200,
                ),
            ))
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
//                'class' => 'form-horizontal',
            ),
        ));
    }

    public function getName()
    {
        return 'form';
    }
}