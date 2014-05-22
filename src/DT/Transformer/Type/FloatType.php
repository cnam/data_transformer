<?php


namespace DT\Transformer\Type;


use DT\Transformer\TypeInterface;

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