<?php


namespace DT\Transformer\Type;


use DT\Transformer\TypeInterface;

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