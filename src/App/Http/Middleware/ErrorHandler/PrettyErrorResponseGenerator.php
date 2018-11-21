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
    private $debug;
    private $template;

    public function __construct(bool $debug, TemplateRenderer $template)
    {
        $this->debug = $debug;
        $this->template = $template;
    }

    public function generate(\Throwable $e, ServerRequestInterface $request): ResponseInterface
    {
        $view = $this->debug ? 'error/error-debug' : 'error/error';

        return new HtmlResponse($this->template->render($view, [
            'request' => $request,
            'exception' => $e,
        ]), self::getStatusCode($e));
    }

    private static function getStatusCode(\Throwable $e) : int
    {
        $code = $e->getCode();
        if ($code >= 400 && $code < 600) {
            return $code;
        }
        return 500;
    }
}
