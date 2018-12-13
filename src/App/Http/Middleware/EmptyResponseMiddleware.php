<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 13-Dec-18
 * Time: 17:18
 */

namespace App\Http\Middleware;

use Framework\Template\TemplateRenderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class EmptyResponseMiddleware implements MiddlewareInterface
{
    private $template;

    public function __construct(TemplateRenderer $template)
    {
        $this->template = $template;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        if ($response->getBody()->getSize() === 0) {
            if ($response->getStatusCode() === 403) {
                $response->getBody()->write($this->template->render('error/403', ['request' => $request]));
            }
            if ($response->getStatusCode() === 404) {
                $response->getBody()->write($this->template->render('error/404', ['request' => $request]));
            }
        }

        return $response;
    }
}
