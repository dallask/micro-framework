<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 14-Nov-18
 * Time: 18:08
 */

namespace Framework\Http;

use Framework\Http\Pipeline\MiddlewareResolver;
use Framework\Http\Pipeline\Pipeline;

class Application extends Pipeline
{

    private $resolver;

    public function __construct(MiddlewareResolver $resolver)
    {
        parent::__construct();
        $this->resolver = $resolver;
    }

    public function pipe($middleware): void
    {
        parent::pipe($this->resolver->resolve($middleware));
    }
}
