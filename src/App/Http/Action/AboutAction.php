<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 12-Nov-18
 * Time: 10:53
 */

namespace App\Http\Action;

use Framework\Template\TemplateRenderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;

class AboutAction implements RequestHandlerInterface
{
    private $template;

    public function __construct(TemplateRenderer $template)
    {
        $this->template = $template;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new HtmlResponse($this->template->render('app/about'));
    }
}
