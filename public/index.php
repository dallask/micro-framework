<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 22-Oct-18
 * Time: 17:57
 */

use Framework\Http\Request;

chdir(dirname(__DIR__));
require 'src/Framework/Http/Request.php';
### Initialization
$request = new Request();
### Action
$name = $request->getQueryParams()['name'] ?? 'Guest';

header('X-Developer: Insane Coder');

echo 'Hello ' . $name . ' :) !';