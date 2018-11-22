<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 22-Nov-18
 * Time: 13:34
 */

namespace Framework\Console;

class Input
{
    private $args;

    public function __construct(array $argv)
    {
        $this->args = \array_slice($argv, 1);
    }

    public function getArgument(int $index): string
    {
        return $this->args[$index] ?? '';
    }
}
