<?php

namespace ITE\DemoBundle\Controller;

use Doctrine\Common\Inflector\Inflector;
use Doctrine\ORM\EntityManager;
use ITE\DemoBundle\Entity\Bundle;
use ITE\DemoBundle\Entity\BundlePage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class BundleController
 * @package ITE\DemoBundle\Controller
 *
 * @Route("/bundle")
 */
class BundleController extends Controller
{
    /**
     * @var EntityManager
     *
     * @DI\Inject("doctrine.orm.entity_manager")
     */
    private $em;

    /**
     * @Route("/", name="ite_demo_bundle_index")
     * @Template()
     */
    public function indexAction()
    {
        $bundles = $this->em->getRepository('ITEDemoBundle:Bundle')->findAll();

        return array(
            'bundles' => $bundles,
        );
    }

    /**
     * @Route("/{bundle}/", name="ite_demo_bundle_index_page", defaults={"path"=""})
     * @Route("/{bundle}/{path}/", name="ite_demo_bundle_other_page", requirements={"path"=".+"})
     * @ParamConverter("bundle", class="ITEDemoBundle:Bundle", options={"mapping": {"bundle": "name"}})
     * @ParamConverter("bundlePage", class="ITEDemoBundle:BundlePage", options={
     *      "repository_method"="findByBundleAndPath"
     * })
     * @Template()
     */
    public function pageAction(Bundle $bundle, BundlePage $bundlePage, Request $request)
    {
        if (preg_match('~^/bundle/ITE([^/]+)Bundle/(?:(.*)/|)([^/]+)/(demo)/$~', $request->getRequestUri(), $matches)) {
            $bundleName = $matches[1];
            $path = implode('/', array_map(function($value) {
                return Inflector::classify($value);
            }, explode('/', $matches[2])));
            $controller = Inflector::classify($matches[3]);
            $action = Inflector::camelize($matches[4]);

            return $this->forward(sprintf('ITEDemoBundle:Bundle/%s/%s/%s:%s', $bundleName, $path, $controller, $action),
                array(
                    'bundle' => $bundle,
                    'bundlePage' => $bundlePage,
                )
            );
        }
    }
}
