<?php

namespace Ddd\Bundle\DddBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Adds tagged slug transliterators in collection.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class TransliteratorsPass implements CompilerPassInterface
{
    const COLLECTION_ID = 'ddd.slug.transliterators';
    const TAG_NAME = 'ddd.slug.transliterator';

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition(self::COLLECTION_ID)) {
            return;
        }

        $collection = $container->getDefinition(self::COLLECTION_ID);

        foreach ($container->findTaggedServiceIds(self::TAG_NAME) as $id => $tags) {
            $collection->addMethodCall('add', array(new Reference($id)));
        }
    }
}
