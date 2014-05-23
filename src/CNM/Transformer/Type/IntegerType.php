<?php

namespace CNM\Transformer\Type;

use CNM\Transformer\TypeInterface;

class IntegerType implements TypeInterface
{

    public function encode($value)
    {
        return (int) $value;
    }

    public function decode($value)
    {
        return (int) $value;
    }
}