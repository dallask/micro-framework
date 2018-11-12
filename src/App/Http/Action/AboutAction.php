<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 12-Nov-18
 * Time: 10:53
 */

namespace App\Http\Action;

use Zend\Diactoros\Response\HtmlResponse;

class AboutAction
{

    public function __invoke()
    {
        return new HtmlResponse('I am a simple site');
    }
}
