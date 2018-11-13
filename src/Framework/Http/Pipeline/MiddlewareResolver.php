<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 12-Nov-18
 * Time: 11:06
 */

namespace Framework\Http\Pipeline;

class MiddlewareResolver
{

    public function resolve($handler): callable
    {
        return \is_string($handler) ? new $handler() : $handler;
    }
}
