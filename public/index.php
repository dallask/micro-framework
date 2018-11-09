<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 22-Oct-18
 * Time: 17:57
 */

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
header(sprintf(
  'HTTP/%s %d %s',
  $response->getProtocolVersion(),
  $response->getStatusCode(),
  $response->getReasonPhrase()
));
foreach ($response->getHeaders() as $name => $value) {
    foreach ($value as $valueItem) {
        header(sprintf('%s: %s', $name, $valueItem), false);
    }
}
echo $response->getBody();
