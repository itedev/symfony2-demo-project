<?php

namespace ITE\DemoBundle;

use ITE\DemoBundle\DependencyInjection\Compiler\FormResourceCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class ITEDemoBundle
 * @package ITE\DemoBundle
 */
class ITEDemoBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new FormResourceCompilerPass());
        parent::build($container);
    }
}
