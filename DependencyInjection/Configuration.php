<?php

namespace JMS\SocialBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $tb = new TreeBuilder();
        $tb
            ->root('jms_social')
                ->children()
                    ->arrayNode('tweet_button')
                        ->addDefaultsIfNotSet()
                        ->canBeUnset()
                        ->children()
                            ->scalarNode('count')
                                ->defaultValue('horizontal')
                                ->validate()
                                    ->ifNotInArray(array('vertical', 'horizontal', 'none'))
                                    ->thenInvalid('Allowed values: vertical, horizontal or none')
                                ->end()
                            ->end()
                            ->scalarNode('via')->cannotBeEmpty()->end()
                            ->arrayNode('related')
                                ->children()
                                    ->scalarNode('name')->isRequired()->cannotBeEmpty()->end()
                                    ->scalarNode('description')->cannotBeEmpty()->end()
                                ->end()
                            ->end()
                            ->scalarNode('text')->cannotBeEmpty()->end()
                            ->scalarNode('url')->cannotBeEmpty()->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $tb;
    }
}