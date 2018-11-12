<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 12-Nov-18
 * Time: 10:56
 */

namespace Tests\App\Http\Action;

use App\Http\Action\HelloAction;
use PHPUnit\Framework\TestCase;
use Zend\Diactoros\ServerRequest;

class HelloActionTest extends TestCase
{

    public function testGuest()
    {
        $action = new HelloAction();
        $request = new ServerRequest();
        $response = $action($request);
        self::assertEquals(200, $response->getStatusCode());
        self::assertEquals('Hello, Guest!',
          $response->getBody()->getContents());
    }

    public function testJohn()
    {
        $action = new HelloAction();
        $request = (new ServerRequest())
          ->withQueryParams(['name' => 'John']);
        $response = $action($request);
        self::assertEquals('Hello, John!', $response->getBody()->getContents());
    }
}
