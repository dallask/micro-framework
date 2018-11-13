<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 13-Nov-18
 * Time: 11:17
 */

namespace App\Http\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;

class NotFoundHandler
{

    public function __invoke(ServerRequestInterface $request)
    {
        return new HtmlResponse('Undefined page', 404);
    }
}
