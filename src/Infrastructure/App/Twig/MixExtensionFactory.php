<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 14-Dec-18
 * Time: 16:24
 */

namespace Infrastructure\App\Twig;

use Psr\Container\ContainerInterface;
use Stormiix\Twig\Extension\MixExtension;

class MixExtensionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config')['mix'];

        return new MixExtension(
            $config['root'],
            $config['manifest']
        );
    }
}
