<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 15-Nov-18
 * Time: 15:23
 */

namespace App\Http\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CredentialsMiddleware
{

    public function __invoke(ServerRequestInterface $request, callable $next)
    {
        /** @var ResponseInterface $response */
        $response = $next($request);
        return $response->withHeader('X-Developer', 'ElisDN');
    }
}

