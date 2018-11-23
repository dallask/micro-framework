<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 22-Nov-18
 * Time: 13:42
 */

namespace Infrastructure\App\Console\Command;

use App\Console\Command\CacheClearCommand;
use App\Service\FileManager;
use Psr\Container\ContainerInterface;

class CacheClearCommandFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new CacheClearCommand(
            $container->get('config')['console']['cachePaths'],
            $container->get(FileManager::class)
        );
    }
}
