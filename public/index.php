<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 22-Oct-18
 * Time: 17:57
 */

$name = !empty($_GET['name']) ? $_GET['name'] : '';

header('X-Developer: Insane Coder');

echo 'Hello ' . $name . ' :) !';