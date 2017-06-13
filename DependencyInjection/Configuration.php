<?php

namespace Muspelheim\SleepBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('muspelheim_sleep');

        $rootNode
            ->children()
                ->arrayNode('stage_lag')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('post')->defaultValue(0)->end()
                        ->scalarNode('get')->defaultValue(0)->end()
                    ->end()
                ->end()
                ->arrayNode('prod_lag')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('post')->defaultValue(0)->end()
                        ->scalarNode('get')->defaultValue(0)->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
