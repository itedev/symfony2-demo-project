<?php

namespace ITE\DemoBundle\Form\Type\Bundle\Form\Component\DynamicChoice;

use ITE\DemoBundle\Entity\NumberRepository;
use ITE\DemoBundle\Form\ChoiceList\ChoiceListBuilder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class DynamicChoiceType
 * @package ITE\DemoBundle\Form\Type\Bundle\Form\Component\DynamicChoice
 */
class DynamicChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choiceTab = $builder->create('choice', 'tab', array(
            'label' => 'Choice',
        ));

        $choiceTab
            ->add('selectChoice', 'choice', array(
                'choices' => ChoiceListBuilder::getChoicesByRange(1, 4),
                'allow_modify' => true,
            ))
            ->add('multipleSelectChoice', 'choice', array(
                'choices' => ChoiceListBuilder::getChoicesByRange(6, 9),
                'multiple' => true,
                'allow_modify' => true,
            ))
            ->add('radioChoice', 'choice', array(
                'choices' => ChoiceListBuilder::getChoicesByRange(11, 14),
                'expanded' => true,
                'allow_modify' => true,
            ))
            ->add('checkboxChoice', 'choice', array(
                'choices' => ChoiceListBuilder::getChoicesByRange(16, 19),
                'expanded' => true,
                'multiple' => true,
                'allow_modify' => true,
            ))
            ->add('addChoiceChoices', 'button', array(
                'label' => 'Add choice',
            ))
        ;

        $entityTab = $builder->create('entity', 'tab', array(
            'label' => 'Entity',
        ));

        $entityTab
            ->add('selectEntity', 'entity', array(
                'class' => 'ITEDemoBundle:Number',
                'query_builder' => function(NumberRepository $er) {
                        return $er->getByIdRangeQueryBuilder(1, 4);
                    },
                'allow_modify' => true,
            ))
            ->add('multipleSelectEntity', 'entity', array(
                'class' => 'ITEDemoBundle:Number',
                'query_builder' => function(NumberRepository $er) {
                        return $er->getByIdRangeQueryBuilder(6, 9);
                    },
                'multiple' => true,
                'allow_modify' => true,
            ))
            ->add('radioEntity', 'entity', array(
                'class' => 'ITEDemoBundle:Number',
                'query_builder' => function(NumberRepository $er) {
                        return $er->getByIdRangeQueryBuilder(11, 14);
                    },
                'expanded' => true,
                'allow_modify' => true,
            ))
            ->add('checkboxEntity', 'entity', array(
                'class' => 'ITEDemoBundle:Number',
                'query_builder' => function(NumberRepository $er) {
                        return $er->getByIdRangeQueryBuilder(16, 19);
                    },
                'expanded' => true,
                'multiple' => true,
                'allow_modify' => true,
            ))
            ->add('addEntityChoices', 'button', array(
                'label' => 'Add entity',
            ))
        ;

        $builder
            ->add($choiceTab)
            ->add($entityTab)
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