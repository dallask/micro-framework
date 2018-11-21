<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 15-Nov-18
 * Time: 15:31
 */

namespace Framework\Http\Middleware;

use Framework\Http\Pipeline\MiddlewareResolver;
use Framework\Http\Router\Result;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DispatchMiddleware
{

    private $resolver;

    public function __construct(MiddlewareResolver $resolver)
    {
        $this->resolver = $resolver;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        /** @var Result $result */
        if (!$result = $request->getAttribute(Result::class)) {
            return $next($request, $response);
        }
        $middleware = $this->resolver->resolve($result->getHandler(), $response);
        return $middleware($request, $response, $next);
    }
}
