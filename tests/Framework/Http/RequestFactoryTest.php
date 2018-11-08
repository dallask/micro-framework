<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 08-Nov-18
 * Time: 16:56
 */

namespace Tests\Framework\Http;

use Framework\Http\Request;
use Framework\Http\RequestFactory;
use PHPUnit\Framework\TestCase;

class RequestFactoryTest extends TestCase
{

    public function testEmpty(): void
    {
        $request = RequestFactory::fromGlobals(
          $queryParams = ['name' => 'John'],
          $parsedBody = ['age' => 42]
        );
        self::assertInstanceOf(Request::class, $request);
        self::assertEquals($queryParams, $request->getQueryParams());
        self::assertEquals($parsedBody, $request->getParsedBody());
    }
}
