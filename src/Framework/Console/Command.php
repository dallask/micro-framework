<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 23-Nov-18
 * Time: 10:31
 */

declare(strict_types=1);

namespace Framework\Console;

interface Command
{
    public function execute(Input $input, Output $output): void;
}
