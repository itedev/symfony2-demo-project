<?php

namespace ITE\DemoBundle\Form\Type\Bundle\Form\Plugin\Nod;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class NodType
 * @package ITE\DemoBundle\Form\Type\Bundle\Form\Plugin\Nod
 */
class NodType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', null, array(
                'constraints' => array(
                    new NotBlank(),
                ),
                'help_block' => 'Not blank.',
            ))
            ->add('textarea', null, array(
                'constraints' => array(
                    new Length(array(
                        'min' => 4,
                        'max' => 8,
                    )),
                ),
                'help_block' => 'Length between 4 and 8.',
            ))
            ->add('email', null, array(
                'constraints' => array(
                    new Email(),
                ),
                'help_block' => 'Email.',
            ))
            ->add('password', 'repeated', array(
                'type' => 'password',
                'first_options' => array(
                    'label' => 'Password',
                ),
                'second_options' => array(
                    'label' => 'Repeat Password',
                    'help_block' => 'Password.',
                ),
                'invalid_message' => 'The password fields must match.',
            ))
            ->add('url')
            ->add('boolean')
            ->add('selectChoice')
            ->add('multipleSelectChoice')
            ->add('radioChoice')
            ->add('checkboxChoice')
            ->add('datetime', null, array(
                'horizontal_input_wrapper_class' => 'col-lg-2',
            ))
            ->add('date', null, array(
                'horizontal_input_wrapper_class' => 'col-lg-2',
            ))
            ->add('time', null, array(
                'horizontal_input_wrapper_class' => 'col-lg-2',
            ))
//            ->add('select2')
//            ->add('tinymce')
//            ->add('bootstrapDatetimepickerDatetime')
//            ->add('bootstrapDatetimepickerDate')
//            ->add('bootstrapDatetimepickerTime')
//            ->add('knob')
            ->add('save', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-primary',
                ),
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ITE\DemoBundle\Entity\Entity',
            'plugins' => 'nod',
            'attr' => array(
                'class' => 'form-horizontal',
            ),
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'form';
    }
}
