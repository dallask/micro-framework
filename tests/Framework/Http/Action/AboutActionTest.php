<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 12-Nov-18
 * Time: 10:56
 */

namespace Tests\App\Http\Action;

use App\Http\Action\AboutAction;
use PHPUnit\Framework\TestCase;
use Zend\Diactoros\ServerRequest;

class AboutActionTest extends TestCase
{

    public function testAbout()
    {
        $action = new AboutAction();
        $request = new ServerRequest();
        $response = $action($request);
        self::assertEquals(200, $response->getStatusCode());
        self::assertEquals('I am a simple site',
          $response->getBody()->getContents());
    }
}
