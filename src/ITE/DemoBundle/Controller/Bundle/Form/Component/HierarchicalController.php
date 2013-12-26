<?php

namespace ITE\DemoBundle\Controller\Bundle\Form\Component;

use ITE\DemoBundle\Entity\Bundle;
use ITE\DemoBundle\Entity\BundlePage;
use ITE\DemoBundle\Form\ChoiceList\ChoiceListBuilder;
use ITE\DemoBundle\Form\Type\Bundle\Form\Component\Hierarchical\HierarchicalType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class HierarchicalController
 * @package ITE\DemoBundle\Controller\Bundle\Form\Component
 *
 * @Route("/bundle/ITEFormBundle/component/hierarchical")
 */
class HierarchicalController extends Controller
{
    /**
     * @Template()
     */
    public function demoAction(Bundle $bundle, BundlePage $bundlePage, Request $request)
    {
        $form = $this->createForm(new HierarchicalType());
        $form->handleRequest($request);

        return array(
            'form' => $form->createView(),
            'bundle' => $bundle,
            'bundlePage' => $bundlePage,
        );
    }

    /**
     * @Route("/get-text-value", name="ite_demo_hierarchical_get_text_value")
     */
    public function getTextValueAction(Request $request)
    {
        $data = $request->request->get('data');
        $root = $data[$request->query->get('name', 'root')];

        return new Response($root);
    }

    /**
     * @Route("/get-choice-value", name="ite_demo_hierarchical_get_choice_value")
     * @Template("ITEFormBundle:Form/Component/dynamic_choice:choices.html.twig")
     */
    public function getChoiceValueAction(Request $request)
    {
        $data = $request->request->get('data');
        $root = $data[$request->query->get('name', 'root')];

        $options = $this->getOptions($root);

        return array(
            'options' => $options,
        );
    }

    /**
     * @Route("/get-expanded-choice-value", name="ite_demo_hierarchical_get_expanded_choice_value")
     * @Template("ITEFormBundle:Form/Component/dynamic_choice:expanded_choices.html.twig")
     */
    public function getExpandedChoiceValueAction(Request $request)
    {
        $data = $request->request->get('data');
        $propertyPath = $request->request->get('propertyPath');

        $root = $data['root'];
        $choices = $this->getChoices($root);

        return array(
            'form' => $this->get('ite_form.widget_generator')->createChoiceView($propertyPath, $choices),
        );
    }

    /**
     * @Route("/get-entity-value", name="ite_demo_hierarchical_get_entity_value")
     * @Template("ITEFormBundle:Form/Component/dynamic_choice:choices.html.twig")
     */
    public function getEntityValueAction(Request $request)
    {
        $data = $request->request->get('data');
        $root = $data['root'];

        $entities = $this->get('doctrine.orm.entity_manager')->getRepository('ITEDemoBundle:Number')
            ->getByIdRange($root * 10 + 1, $root * 10 + 5);
        $options = $this->get('ite_form.entity_converter')->convertEntitiesToOptions($entities);

        return array(
            'options' => $options,
        );
    }

    /**
     * @Route("/get-expanded-entity-value", name="ite_demo_hierarchical_get_expanded_entity_value")
     * @Template("ITEFormBundle:Form/Component/dynamic_choice:expanded_choices.html.twig")
     */
    public function getExpandedEntityValueAction(Request $request)
    {
        $data = $request->request->get('data');
        $propertyPath = $request->request->get('propertyPath');

        $root = $data['root'];
        $entities = $this->get('doctrine.orm.entity_manager')->getRepository('ITEDemoBundle:Number')
            ->getByIdRange($root * 10 + 1, $root * 10 + 5);
        $choices = $this->get('ite_form.entity_converter')->convertEntitiesToChoices($entities);

        return array(
            'form' => $this->get('ite_form.widget_generator')->createChoiceView($propertyPath, $choices),
        );
    }

    /**
     * @Route("/get-color-value", name="ite_demo_hierarchical_get_color_value")
     */
    public function getColorValueAction(Request $request)
    {
        $data = $request->request->get('data');
        $root = $data['root'];

        return new Response(sprintf('#%2x%2x%2x',
            (($root - 1) * 32) + 127,
            ((($root - 1) * 32 + 42) % 128) + 127,
            ((($root - 1) * 32 + 84) % 128) + 127
        ));
    }

    /**
     * @Route("/get-datetime-value", name="ite_demo_hierarchical_get_datetime_value")
     */
    public function getDatetimeValueAction(Request $request)
    {
        $data = $request->request->get('data');
        $root = $data['root'];

        $datetime = new \DateTime();
        $datetime->setDate(date('Y'), $root, $root);
        $datetime->setTime($root, $root);

        return new Response($datetime->format('Y-m-d H:i'));
    }

    /**
     * @Route("/get-leaf-value", name="ite_demo_hierarchical_get_leaf_value")
     */
    public function getLeafValueAction(Request $request)
    {
        $data = $request->request->get('data');

        return new Response(print_r($data, true));
    }

    /**
     * @param $number
     * @return array
     */
    protected function getOptions($number)
    {
        $choices = $this->getChoices($number);
        $options = array();
        foreach ($choices as $value => $label) {
            $options[] = array(
                'value' => $value,
                'label' => $label,
            );
        }

        return $options;
    }

    /**
     * @param $number
     * @return array
     */
    protected function getChoices($number)
    {
        return ChoiceListBuilder::getChoicesByRange($number * 10 + 1, $number * 10 + 5);
    }
}
