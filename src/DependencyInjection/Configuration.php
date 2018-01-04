<?php

namespace BreadcrumbsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package BreadcrumbsBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('breadcrumbs');

        $rootNode
            ->children()
                ->arrayNode('separator')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('value')
                            ->defaultValue('/')
                        ->end()
                        ->scalarNode('class')
                            ->defaultValue('separator')
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('list')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('type')
                            ->defaultValue('ul')
                        ->end()
                        ->scalarNode('class')
                            ->defaultValue('separator')
                        ->end()
                    ->end()
                ->end()
                ->scalarNode('template')
                    ->defaultValue('BreadcrumbsBundle::template.html.twig')
                ->end()
            ->end();

        return $treeBuilder;
    }
}