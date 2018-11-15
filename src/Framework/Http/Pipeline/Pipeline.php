<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 13-Nov-18
 * Time: 11:14
 */

namespace Framework\Http\Pipeline;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Pipeline
{

    private $queue;

    public function __construct()
    {
        $this->queue = new \SplQueue();
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next
    ): ResponseInterface {
        $delegate = new Next(clone $this->queue, $next);
        return $delegate($request, $response);
    }

    public function pipe($middleware): void
    {
        $this->queue->enqueue($middleware);
    }
}
