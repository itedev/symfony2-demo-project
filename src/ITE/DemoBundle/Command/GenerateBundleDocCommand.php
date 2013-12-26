<?php

namespace ITE\DemoBundle\Command;

use Doctrine\ORM\EntityManager;
use ITE\DemoBundle\Entity\Bundle;
use ITE\DemoBundle\Entity\BundlePage;
use ITE\DemoBundle\Generator\ProjectGenerator;
use ITE\DemoBundle\Transformer\TwitterBootstrap3Transformer;
use JMS\RstBundle\Model\File;
use JMS\RstBundle\Model\Project;
use JMS\RstBundle\PreProcessor\SymfonyPathPreProcessor;
use JMS\RstBundle\Transformer\ImageEmbeddingTransformer;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Class GenerateBundleDocCommand
 * @package ITE\DemoBundle\Command
 */
class GenerateBundleDocCommand extends ContainerAwareCommand
{
    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this
            ->setName('ite:demo:generate-bundle-doc')
            ->setDescription('Generate bundle documentation')
            ->addArgument('bundle', InputArgument::OPTIONAL, 'Bundle name')
        ;
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var $em EntityManager */
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        if (null !== $bundle = $input->getArgument('bundle')) {
            $bundles = $em->getRepository('ITEDemoBundle:Bundle')->findBy(array(
                'name' => $bundle,
            ));
        } else {
            $bundles = $em->getRepository('ITEDemoBundle:Bundle')->findAll();
        }

        /** @var $kernel KernelInterface */
        $kernel = $this->getContainer()->get('kernel');
        /** @var $projectGenerator ProjectGenerator */
        $projectGenerator = $this->getContainer()->get('ite_demo.project_generator');
        $projectGenerator->addTransformer(new ImageEmbeddingTransformer());
        $projectGenerator->addTransformer(new TwitterBootstrap3Transformer());
        $projectGenerator->addPreProcessor(new SymfonyPathPreProcessor($this->getContainer()->get('router')));
        foreach ($bundles as $bundle) {
            /** @var $bundle Bundle */
            $bundlePath = $kernel->getBundle($bundle->getName())->getPath();

            $docPath = $bundlePath . '/Resources/doc/';
            /** @var $project Project */
            $project = $projectGenerator->generate($docPath);

            $bundle->clearBundlePages();
            $em->persist($bundle);
            $em->flush();

            foreach ($project->getFiles() as $file) {
                /** @var $file File */
                $bundlePage = new BundlePage($file);
                $bundle->addBundlePage($bundlePage);
            }

            $em->persist($bundle);
            $em->flush();
        }

    }
}