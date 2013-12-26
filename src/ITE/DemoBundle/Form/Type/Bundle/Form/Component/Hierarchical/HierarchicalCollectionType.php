<?php

namespace ITE\DemoBundle\Form\Type\Bundle\Form\Component\Hierarchical;

use ITE\DemoBundle\Form\ChoiceList\ChoiceListBuilder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class HierarchicalCollectionType
 * @package ITE\DemoBundle\Form\Type\Bundle\Form\Component\Hierarchical
 */
class HierarchicalCollectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('root', 'choice', array(
                'choices' => ChoiceListBuilder::getChoicesByRange(1, 5),
                'attr' => array(
                    'class' => 'root',
                ),
                'label_render' => false,
                'horizontal' => false,
            ))
            ->add('selectChoice', 'choice', array(
                'label_render' => false,
                'horizontal' => false,
                'hierarchical' => array(
                    'parents' => 'root',
                    'route' => 'ite_demo_hierarchical_get_choice_value',
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