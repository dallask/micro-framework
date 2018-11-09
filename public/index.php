<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 22-Oct-18
 * Time: 17:57
 */

use Framework\Http\ResponseSender;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequestFactory;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';
### Initialization
$request = ServerRequestFactory::fromGlobals();
### Action
$name = $request->getQueryParams()['name'] ?? 'Guest';

$response = (new HtmlResponse('Hello, ' . $name . '!'))
  ->withHeader('X-Developer', 'ElisDN');
### Sending
$emitter = new ResponseSender();
$emitter->send($response);
