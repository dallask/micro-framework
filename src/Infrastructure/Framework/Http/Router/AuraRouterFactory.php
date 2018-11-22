<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 22-Nov-18
 * Time: 13:19
 */

namespace Infrastructure\Framework\Http\Router;

use Aura\Router\RouterContainer;
use Framework\Http\Router\AuraRouterAdapter;
use Interop\Container\ContainerInterface;

class AuraRouterFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new AuraRouterAdapter(new RouterContainer());
    }
}
