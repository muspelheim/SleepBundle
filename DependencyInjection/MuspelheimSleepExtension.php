<?php

namespace Muspelheim\SleepBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class MuspelheimSleepExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('muspelheim_sleep.dev_lag.post', $config['dev_lag']['post']);
        $container->setParameter('muspelheim_sleep.dev_lag.get', $config['dev_lag']['get']);
        $container->setParameter('muspelheim_sleep.prod_lag.post', $config['prod_lag']['post']);
        $container->setParameter('muspelheim_sleep.prod_lag.get', $config['prod_lag']['get']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
