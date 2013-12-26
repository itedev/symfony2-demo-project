<?php

namespace ITE\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Intl\Intl;

/**
 * Class HomeController
 * @package ITE\DemoBundle\Controller
 */
class HomeController extends Controller
{
    /**
     * @Route("/", name="ite_demo_home_index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
