<?php

namespace ITE\DemoBundle\Controller\Bundle\Form\Component;

use ITE\DemoBundle\Entity\Bundle;
use ITE\DemoBundle\Entity\BundlePage;
use ITE\DemoBundle\Form\Type\Bundle\Form\Component\DynamicChoice\DynamicChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DynamicChoiceController
 * @package ITE\DemoBundle\Controller\Bundle\Form\Component
 */
class DynamicChoiceController extends Controller
{
    /**
     * @Template()
     */
    public function demoAction(Bundle $bundle, BundlePage $bundlePage, Request $request)
    {
        $form = $this->createForm(new DynamicChoiceType());
        $form->handleRequest($request);

        return array(
            'form' => $form->createView(),
            'bundle' => $bundle,
            'bundlePage' => $bundlePage,
        );
    }
}
