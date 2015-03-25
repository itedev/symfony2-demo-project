<?php

namespace ITE\DemoBundle\Controller\Bundle\Form\Plugin;

use ITE\DemoBundle\Form\Type\Bundle\Form\Plugin\Select2\Select2Type;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Select2Controller
 * @package ITE\DemoBundle\Controller\Bundle\Form\Plugin
 *
 * @Route("/bundle/ITEFormBundle/plugin/select2")
 */
class Select2Controller extends Controller
{
    /**
     * @Route("/demo", name="ite_demo_bundle_form_plugin_select2_overview")
     * @Template()
     */
    public function demoAction(Request $request)
    {
        $form = $this->createForm(new Select2Type());

        $form->handleRequest($request);

        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * @Route("/configuration", name="ite_demo_bundle_form_plugin_select2_configuration")
     * @Template()
     */
    public function configurationAction()
    {
        return array();
    }
}
