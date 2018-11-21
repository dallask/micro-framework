<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 13-Nov-18
 * Time: 11:17
 */

namespace App\Http\Middleware;

use Framework\Template\TemplateRenderer;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;

class NotFoundHandler
{
    private $template;

    public function __construct(TemplateRenderer $template)
    {
        $this->template = $template;
    }

    public function __invoke(ServerRequestInterface $request)
    {
        return new HtmlResponse($this->template->render('error/404', [
            'request' => $request,
        ]), 404);
    }
}
