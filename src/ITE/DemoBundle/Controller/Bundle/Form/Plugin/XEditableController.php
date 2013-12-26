<?php

namespace ITE\DemoBundle\Controller\Bundle\Form\Plugin;

use ITE\DemoBundle\Entity\Bundle;
use ITE\DemoBundle\Entity\BundlePage;
use ITE\DemoBundle\Form\Type\Bundle\Form\Plugin\Select2\Select2Type;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class XEditableController
 * @package ITE\DemoBundle\Controller\Bundle\Form\Plugin
 */
class XEditableController extends Controller
{
    /**
     * @Template()
     */
    public function demoAction(Bundle $bundle, BundlePage $bundlePage, Request $request)
    {
        $entity = $this->getDoctrine()->getManager()->getRepository('ITEDemoBundle:Entity')->find(1);

        return array(
            'entity' => $entity,
            'bundle' => $bundle,
            'bundlePage' => $bundlePage,
        );
    }
}
