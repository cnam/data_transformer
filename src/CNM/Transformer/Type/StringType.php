<?php

namespace CNM\Transformer\Type;

use CNM\Transformer\TypeInterface;

class StringType implements TypeInterface
{

    public function encode($value)
    {
        return (string) $value;
    }

    public function decode($value)
    {
        return (string) $value;
    }
}