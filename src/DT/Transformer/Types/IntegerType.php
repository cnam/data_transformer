<?php

namespace DT\Transformer\Type;

use DT\Transformer\TypeInterface;

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