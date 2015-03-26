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
            ->add('simpleItems', 'collection', [
                'label' => 'Simple collection',
                'type' => 'email',
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'options' => [
                    'label_render' => false,
                    'widget_addon_prepend' => [
                        'text' => '@',
                    ],
                    'widget_remove_btn' => [
                        'wrapper_div' => false,
                        'horizontal_wrapper_div' => [
                            'class' => 'col-sm-3',
                        ],
                    ],
                    'widget_form_group_attr' => [
                        'class' => 'row form-group',
                    ],
                ],
            ])
            ->add('extendedItems', 'collection', [
                'label' => 'Extended collection with table layout and plugins',
                'type' => new CollectionLevel2Type(),
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'collection_item_tag' => 'tr',
                'options' => [
                    'label_render' => false,
                    'widget_remove_btn' => [
                        'horizontal_wrapper_div' => false,
                        'wrapper_div' => false,
                    ],
                    'widget_form_group_attr' => [
                        'class' => '',
                    ],
                ],
            ])
            ->add('eventItems', 'collection', [
                'label' => 'Collection with events and animation',
                'type' => 'email',
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'options' => [
                    'label_render' => false,
                    'widget_addon_prepend' => [
                        'text' => '@',
                    ],
                    'widget_remove_btn' => [
                        'wrapper_div' => false,
                        'horizontal_wrapper_div' => [
                            'class' => 'col-sm-3',
                        ],
                    ],
                    'widget_form_group_attr' => [
                        'class' => 'row form-group',
                    ],
                ],
                'widget_show_animation' => [
                    'type' => 'fade',
                    'length' => 200,
                ],
                'widget_hide_animation' => [
                    'type' => 'slide',
                    'length' => 200,
                ],
                'help_block' => 'In this example we use `ite-before-add.collection` event to limit items count to 5 and `ite-before-remove.collection` event to restrict removing even items',
            ])
            ->add('save', 'submit', [
                'attr' => [
                    'class' => 'btn-primary',
                ],
            ])
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'horizontal' => false,
        ]);
    }

    public function getName()
    {
        return 'form';
    }
}