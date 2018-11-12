<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 12-Nov-18
 * Time: 10:56
 */

namespace Tests\App\Http\Action\Blog;

use App\Http\Action\Blog\ShowAction;
use PHPUnit\Framework\TestCase;
use Zend\Diactoros\ServerRequest;

class ShowActionTest extends TestCase
{

    public function testSuccess()
    {
        $action = new ShowAction();
        $request = (new ServerRequest())
          ->withAttribute('id', $id = 2);
        $response = $action($request);
        self::assertEquals(200, $response->getStatusCode());
        self::assertJsonStringEqualsJsonString(
          json_encode(['id' => $id, 'title' => 'Post #' . $id]),
          $response->getBody()->getContents()
        );
    }

    public function testNotFound()
    {
        $action = new ShowAction();
        $request = (new ServerRequest())
          ->withAttribute('id', $id = 10);
        $response = $action($request);
        self::assertEquals(404, $response->getStatusCode());
        self::assertEquals('Undefined page',
          $response->getBody()->getContents());
    }
}
