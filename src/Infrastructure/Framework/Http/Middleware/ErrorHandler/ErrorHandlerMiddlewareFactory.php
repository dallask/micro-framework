<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 22-Nov-18
 * Time: 13:19
 */

namespace Infrastructure\Framework\Http\Middleware\ErrorHandler;

use Framework\Http\Middleware\ErrorHandler\ErrorHandlerMiddleware;
use Framework\Http\Middleware\ErrorHandler\ErrorResponseGenerator;
use Psr\Container\ContainerInterface;

class ErrorHandlerMiddlewareFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $middleware =  new ErrorHandlerMiddleware(
            $container->get(ErrorResponseGenerator::class)
        );
        $middleware->addListener($container->get(LogErrorListener::class));
        return $middleware;
    }
}
