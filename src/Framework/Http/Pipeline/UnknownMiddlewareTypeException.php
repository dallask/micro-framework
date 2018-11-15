<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 15-Nov-18
 * Time: 15:43
 */

namespace Framework\Http\Pipeline;

class UnknownMiddlewareTypeException extends \InvalidArgumentException
{

    private $type;

    public function __construct($type)
    {
        parent::__construct('Unknown middleware type');
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }
}
