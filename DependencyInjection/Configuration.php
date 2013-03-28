<?php

namespace Ddd\Bundle\DddBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Ddd DIC configuration.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ddd');

        $this->addSlugSection($rootNode);

        return $treeBuilder;
    }

    /**
     * @param ArrayNodeDefinition $rootNode
     */
    private function addSlugSection(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
                ->scalarNode('word_separator')->defaultValue('-')->end()
                ->scalarNode('field-separator')->defaultValue('-')->end()
                ->scalarNode('transliterator')->defaultValue('latin')->end()
            ->end()
        ;
    }
}
