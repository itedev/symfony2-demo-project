<?php

namespace ITE\DemoBundle\Form\Type\Bundle\Form\Component\Collection;

use ITE\DemoBundle\Form\ChoiceList\ChoiceListBuilder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class CollectionLevel2Type
 * @package ITE\DemoBundle\Form\Type\Bundle\Form\Component\Collection
 */
class CollectionLevel2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', 'text', [
                'label_render' => false,
                'attr' => [
                    'class' => 'width100px',
                ],
                'widget_form_group_attr' => [
                    'class' => '',
                ],
                'horizontal' => false,
            ])
            ->add('select2', 'ite_select2_choice', [
                'label_render' => false,
                'choices' => ChoiceListBuilder::getChoicesByRange(1, 5),
                'attr' => [
                    'class' => 'width100px',
                ],
                'widget_form_group_attr' => [
                    'class' => '',
                ],
                'horizontal' => false,
            ])
            ->add('bootstrapColorpicker', 'ite_bootstrap_colorpicker_text', [
                'label_render' => false,
                'attr' => [
                    'class' => 'width100px',
                ],
                'widget_form_group_attr' => [
                    'class' => '',
                ],
                'horizontal' => false,
            ])
//            ->add('minicolors', 'ite_minicolors_text', array(
//                'label_render' => false,
//                'attr' => array(
//                    'class' => 'width100px',
//                ),
//                'widget_form_group_attr' => array(
//                    'class' => '',
//                ),
//                'horizontal' => false,
//            ))
            ->add('bootstrapSpinedit', 'ite_bootstrap_spinedit_number', [
                'label_render' => false,
                'precision' => 2,
                'plugin_options' => [
                    'step' => 0.25,
                ],
                'widget_form_group_attr' => [
                    'class' => '',
                ],
                'horizontal' => false,
            ])
            ->add('bootstrapDatetimepicker', 'ite_bootstrap_datetimepicker_datetime', [
                'label_render' => false,
                'attr' => [
                    'class' => 'width150px',
                ],
                'widget_form_group_attr' => [
                    'class' => '',
                ],
                'horizontal' => false,
            ])
            ->add('collectionItems', 'collection', [
                'label_render' => false,
                'type' => 'email',
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'prototype_name' => '__another_name__',
                'by_reference' => false,
                'options' => [
                    'label_render' => false,
                    'widget_remove_btn' => [
                        'label' => null,
                        'wrapper_div' => false,
                        'horizontal_wrapper_div' => [
                            'class' => 'col-sm-5',
                        ],
                    ],
                    'widget_form_group_attr' => [
                        'class' => 'row form-group',
                    ],
                ],
                'widget_form_group_attr' => [
                    'class' => '',
                ],
                'horizontal' => false,
            ])
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