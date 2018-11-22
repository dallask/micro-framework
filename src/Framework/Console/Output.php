<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 22-Nov-18
 * Time: 13:36
 */

namespace Framework\Console;

class Output
{
    public function write(string $message): void
    {
        echo $message;
    }

    public function writeln(string $message): void
    {
        echo $message . PHP_EOL;
    }
}
