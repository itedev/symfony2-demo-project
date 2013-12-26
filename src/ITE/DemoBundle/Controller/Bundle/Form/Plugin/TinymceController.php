<?php

namespace ITE\DemoBundle\Controller\Bundle\Form\Plugin;

use ITE\DemoBundle\Form\Type\Bundle\Form\Plugin\Tinymce\TinymceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TinymceController
 * @package ITE\DemoBundle\Controller\Bundle\Form\Plugin
 *
 * @Route("/bundle/ITEFormBundle/plugin/tinymce")
 */
class TinymceController extends Controller
{
    /**
     * @Route("/overview", name="ite_demo_bundle_form_plugin_tinymce_overview")
     * @Template()
     */
    public function overviewAction(Request $request)
    {
        $form = $this->createForm(new TinymceType());

        $form->handleRequest($request);

        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * @Route("/configuration", name="ite_demo_bundle_form_plugin_tinymce_configuration")
     * @Template()
     */
    public function configurationAction()
    {
        return array();
    }
}
