<?php
namespace ClassifiedsMaciej\HermesClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('hermes_client');

        $rootNode
            ->children()
                ->scalarNode('base_url')->end()
                ->integerNode('retries')->end()
                ->integerNode('retry_sleep')->end()
                ->arrayNode('guzzle')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}