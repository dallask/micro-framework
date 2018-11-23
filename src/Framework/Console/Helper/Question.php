<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 23-Nov-18
 * Time: 10:35
 */

namespace Framework\Console\Helper;

use Framework\Console\Input;
use Framework\Console\Output;

class Question
{
    public static function choose(Input $input, Output $output, string $prompt, array $options): string
    {
        do {
            $output->write($prompt . ' [' . implode(',', $options) . ']: ');
            $choose = trim($input->read());
        } while (!\in_array($choose, $options, true));
        return $choose;
    }
}
