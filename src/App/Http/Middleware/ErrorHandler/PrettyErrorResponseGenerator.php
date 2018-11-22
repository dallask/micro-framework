<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 21-Nov-18
 * Time: 15:46
 */

namespace App\Http\Middleware\ErrorHandler;

use Framework\Template\TemplateRenderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Stratigility\Utils;

class PrettyErrorResponseGenerator implements ErrorResponseGenerator
{
    private $template;
    private $response;
    private $views;

    public function __construct(TemplateRenderer $template, ResponseInterface $response, array $views)
    {
        $this->template = $template;
        $this->response = $response;
        $this->views = $views;
    }

    public function generate(\Throwable $e, ServerRequestInterface $request): ResponseInterface
    {
        $code = Utils::getStatusCode($e, $this->response);

        $response = $this->response->withStatus($code);
        $response
            ->getBody()
            ->write($this->template->render($this->getView($code), [
                'request' => $request,
                'exception' => $e,
            ]));

        return $response;
    }

    private function getView($code): string
    {
        if (array_key_exists($code, $this->views)) {
            $view = $this->views[$code];
        } else {
            $view = $this->views['error'];
        }
        return $view;
    }
}
