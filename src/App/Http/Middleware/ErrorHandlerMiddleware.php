<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 15-Nov-18
 * Time: 15:26
 */

namespace App\Http\Middleware;

use Framework\Template\TemplateRenderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;

class ErrorHandlerMiddleware implements MiddlewareInterface
{
    private $debug;
    private $template;

    public function __construct(bool $debug, TemplateRenderer $template)
    {
        $this->debug = $debug;
        $this->template = $template;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            return $handler->handle($request);
        } catch (\Throwable $e) {
            $view = $this->debug ? 'error/error-debug' : 'error/error';
            return new HtmlResponse($this->template->render($view, [
                'request' => $request,
                'exception' => $e,
            ]), $e->getCode() ?: 500);
        }
    }
}
