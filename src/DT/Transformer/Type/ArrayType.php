<?php


namespace DT\Transformer\Type;

use DT\Transformer\TypeInterface;
use Exception;

class ArrayType implements TypeInterface
{

    public function encode($value)
    {
        if (!is_array($value)) {
            throw new Exception($value.' not converted to string from array');
        }

        return serialize($value);
    }

    public function decode($value)
    {
        if (!is_string($value)) {
            throw new Exception($value.' not converted to array');
        }
        return unserialize($value);
    }
}