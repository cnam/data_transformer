<?php

namespace DT\Transformer\Type;

use DT\Transformer\TypeInterface;

class BoolType implements TypeInterface
{

    public function encode($value)
    {
        return (int) $value;
    }

    public function decode($value)
    {
        return (bool) $value;
    }
}