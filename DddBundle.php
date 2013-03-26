<?php

namespace Ddd\Bundle\DddBundle;

use Ddd\Bundle\DddBundle\DependencyInjection\Compiler\TransliteratorsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Bundle class for Ddd components integration.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class DddBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new TransliteratorsPass());
    }
}
