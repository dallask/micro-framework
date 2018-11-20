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
use Framework\Template\TemplateRenderer;

class HelloActionTest extends TestCase
{

    private $renderer;

    protected function setUp(): void
    {
        parent::setUp();
        $this->renderer = new TemplateRenderer('templates');
    }

    public function testGuest()
    {
        $action = new HelloAction($this->renderer);
        $request = new ServerRequest();
        $response = $action($request);
        self::assertEquals(200, $response->getStatusCode());
        self::assertContains('Hello, Guest!',
          $response->getBody()->getContents());
    }

    public function testJohn()
    {
        $action = new HelloAction($this->renderer);
        $request = (new ServerRequest())
          ->withQueryParams(['name' => 'John']);
        $response = $action($request);
        self::assertContains('Hello, John!', $response->getBody()->getContents());
    }
}
