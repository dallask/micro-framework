<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 15-Nov-18
 * Time: 16:10
 */

namespace Tests\Framework\Container;

use Framework\Container\Container;
use Framework\Container\ServiceNotFoundException;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{

    public function testPrimitives()
    {
        $container = new Container();
        $container->set($name = 'name', $value = 5);
        self::assertEquals($value, $container->get($name));
        $container->set($name = 'name', $value = 'string');
        self::assertEquals($value, $container->get($name));
        $container->set($name = 'name', $value = ['array']);
        self::assertEquals($value, $container->get($name));
        $container->set($name = 'name', $value = new \stdClass());
        self::assertEquals($value, $container->get($name));
    }

    public function testCallback()
    {
        $container = new Container();
        $container->set($name = 'name', function () {
            return new \stdClass();
        });
        self::assertNotNull($value = $container->get($name));
        self::assertInstanceOf(\stdClass::class, $value);
    }

    public function testNotFound()
    {
        $container = new Container();
        $this->expectException(ServiceNotFoundException::class);
        $container->get('email');
    }
}
