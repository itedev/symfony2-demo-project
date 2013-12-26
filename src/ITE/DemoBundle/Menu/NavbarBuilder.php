<?php

namespace ITE\DemoBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class NavbarBuilder
 * @package ITE\DemoBundle\Menu
 */
class NavbarBuilder
{
    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param Request $request
     * @return \Knp\Menu\ItemInterface
     */
    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root', array(
            'navbar' => true,
        ));

        $menu->addChild('Home', array('route' => 'ite_demo_home_index'));
        $menu->addChild('Bundles', array('route' => 'ite_demo_bundle_index'));

//        $bundleDropdown = $menu->addChild('Bundles', array(
//            'dropdown' => true,
//            'caret' => true,
//            'route' => 'ite_demo_bundle_index'
//        ));

        return $menu;
    }
} 