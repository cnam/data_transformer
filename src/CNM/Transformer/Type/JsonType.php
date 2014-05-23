<?php


namespace CNM\Transformer\Type;

use CNM\Transformer\TypeInterface;
use Exception;

class JsonType implements TypeInterface
{
    public function encode($value)
    {
        if (!is_array($value)) {
            throw new Exception($value.' not converted to string from array');
        }

        $result = json_encode($value);

        if (json_last_error() === JSON_ERROR_NONE) {
            return $result;
        }

        return '[]';
    }

    public function decode($value)
    {
        $result = json_decode($value, true);

        if (json_last_error() === JSON_ERROR_NONE) {
            return $result;
        }

        return array();
    }
}