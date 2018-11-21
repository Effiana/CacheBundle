<?php

namespace Effiana\CacheBundle;

use Effiana\CacheBundle\DependencyInjection\Compiler\CacheConfigurationPass;
use Effiana\CacheBundle\DependencyInjection\Compiler\CacheWarmerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class EffianaCacheBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new CacheConfigurationPass());
        $container->addCompilerPass(new CacheWarmerPass());
    }
}
