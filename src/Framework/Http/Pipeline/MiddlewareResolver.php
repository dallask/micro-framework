<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 12-Nov-18
 * Time: 11:06
 */

namespace Framework\Http\Pipeline;

use Psr\Http\Message\ServerRequestInterface;

class MiddlewareResolver
{

    public function resolve($handler): callable
    {
        if (\is_string($handler)) {
            return function (ServerRequestInterface $request, callable $next) use ($handler) {
                $object = new $handler();
                return $object($request, $next);
            };
        }
        return $handler;
    }
}
