<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 13-Nov-18
 * Time: 11:13
 */

namespace Framework\Http\Pipeline;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Next
{

    private $queue;

    private $next;

    public function __construct(\SplQueue $queue, callable $next)
    {
        $this->queue = $queue;
        $this->next = $next;
    }

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        if ($this->queue->isEmpty()) {
            return ($this->next)($request);
        }
        $middleware = $this->queue->dequeue();
        return $middleware(
            $request,
            function (ServerRequestInterface $request) {
                return $this($request);
            }
        );
    }
}
