<?php

namespace CNM\Transformer\Type;

use CNM\Transformer\TypeInterface;

class FloatType implements TypeInterface
{

    public function encode($value)
    {
        return floatval($value);
    }

    public function decode($value)
    {
        return floatval($value);
    }
}