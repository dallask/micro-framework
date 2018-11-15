<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 15-Nov-18
 * Time: 16:09
 */

namespace Framework\Container;

class Container
{

    private $definitions = [];

    public function get($id)
    {
        if (!array_key_exists($id, $this->definitions)) {
            throw new ServiceNotFoundException('Unknown service "' . $id . '"');
        }

        $definition = $this->definitions[$id];
        if ($definition instanceof \Closure) {
            $result = $definition();
        } else {
            $result = $definition;
        }
        return $result;
    }

    public function set($id, $value): void
    {
        $this->definitions[$id] = $value;
    }
}
