<?php

namespace Black\Bundle\PlaceBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @var
     */
    private $alias;

    /**
     * @param $alias
     */
    public function __construct($alias)
    {
        $this->alias    = $alias;
    }

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root($this->alias);

        $supportedDrivers = array('mongodb');

        $rootNode
            ->children()

            ->scalarNode('db_driver')
            ->isRequired()
            ->validate()
            ->ifNotInArray($supportedDrivers)
            ->thenInvalid('The database driver must be either \'mongodb\'.')
            ->end()
            ->end()

            ->scalarNode('place_class')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('place_manager')->defaultValue('Black\\Bundle\\PlaceBundle\\Doctrine\\PlaceManager')->end()

            ->end();

        $this->addPlaceSection($rootNode);
        $this->addControllerSection($rootNode);

        return $treeBuilder;
    }

    /**
     * @param ArrayNodeDefinition $node
     */
    private function addPlaceSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
            ->arrayNode('place')
            ->addDefaultsIfNotSet()
            ->canBeUnset()
            ->children()
            ->arrayNode('form')
            ->addDefaultsIfNotSet()
            ->children()
            ->scalarNode('name')->defaultValue('black_place_place_form')->end()
            ->scalarNode('type')->defaultValue('Black\\Bundle\\PlaceBundle\\Form\\Type\\PlaceType')->end()
            ->scalarNode('handler')->defaultValue('Black\\Bundle\\PlaceBundle\\Form\\Handler\\PlaceFormHandler')->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end();
    }

    /**
     * @param ArrayNodeDefinition $node
     */
    private function addControllerSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
            ->arrayNode('controller')
            ->addDefaultsIfNotSet()
            ->canBeUnset()
            ->children()
            ->arrayNode('class')
            ->addDefaultsIfNotSet()
            ->children()
            ->scalarNode('place')->defaultValue('Black\\Bundle\\PlaceBundle\\Controller\\PlaceController')->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end();
    }
}
