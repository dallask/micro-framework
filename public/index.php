<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 22-Oct-18
 * Time: 17:57
 */

use Framework\Http\RequestFactory;
use Framework\Http\Response;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';
### Initialization
$request = RequestFactory::fromGlobals();
### Action
$name = $request->getQueryParams()['name'] ?? 'Guest';

$response = (new Response('Hello, ' . $name . '!'))
  ->withHeader('X-Developer', 'ElisDN');
### Sending
header('HTTP/1.0 ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase());
foreach ($response->getHeaders() as $name => $value) {
    header($name . ':' . $value);
}
echo $response->getBody();
