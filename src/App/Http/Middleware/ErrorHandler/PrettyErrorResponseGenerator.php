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
use Zend\Diactoros\Response\HtmlResponse;

class PrettyErrorResponseGenerator implements ErrorResponseGenerator
{
    private $template;
    private $views;

    public function __construct(TemplateRenderer $template, array $views)
    {
        $this->template = $template;
        $this->views = $views;
    }

    public function generate(\Throwable $e, ServerRequestInterface $request): ResponseInterface
    {
        $code = self::getStatusCode($e);
        return new HtmlResponse($this->template->render($this->getView($code), [
            'request' => $request,
            'exception' => $e,
        ]), $code);
    }

    private static function getStatusCode(\Throwable $e) : int
    {
        $code = $e->getCode();
        if ($code >= 400 && $code < 600) {
            return $code;
        }
        return 500;
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
