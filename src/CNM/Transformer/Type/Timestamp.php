<?php


namespace CNM\Transformer\Type;


use CNM\Transformer\TypeInterface;
use Exception;

class Timestamp implements TypeInterface
{

    const DATE_FORMAT = 'Y-m-d H:i:s';

    public function encode($value)
    {
        return date(self::DATE_FORMAT, $value);
    }

    public function decode($value)
    {
        if (date_create_from_format(self::DATE_FORMAT, $value) == false) {
            return time();
        }
        return date_create_from_format(self::DATE_FORMAT, $value)->getTimestamp();
    }
}