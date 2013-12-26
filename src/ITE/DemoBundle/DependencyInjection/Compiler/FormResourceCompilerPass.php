<?php

namespace ITE\DemoBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class FormResourceCompilerPass
 * @package ITE\DemoBundle\DependencyInjection\Compiler
 */
class FormResourceCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $resources = $container->getParameter('twig.form.resources');
        $resources[] = 'ITEDemoBundle:Form:fields.html.twig';
        $container->setParameter('twig.form.resources', $resources);
    }
}