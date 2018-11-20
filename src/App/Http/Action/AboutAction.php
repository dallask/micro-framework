<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 12-Nov-18
 * Time: 10:53
 */

namespace App\Http\Action;

use Zend\Diactoros\Response\HtmlResponse;
use Framework\Template\TemplateRenderer;

class AboutAction
{
    private $template;

    public function __construct(TemplateRenderer $template)
    {
        $this->template = $template;
    }

    public function __invoke()
    {
        return new HtmlResponse($this->template->render('app/about'));
    }
}
