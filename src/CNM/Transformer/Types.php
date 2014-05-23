<?php


namespace CNM\Transformer;

use CNM\Transformer\Type;

final class Types
{
    public static function factory(){
        return array(
            'array' => new Type\ArrayType(),
            'json' => new Type\JsonType(),
            'timestamp' => new Type\Timestamp(),
            'bool' => new Type\BoolType(),
            'integer' => new Type\IntegerType(),
            'string' => new Type\StringType(),
            'float' => new Type\FloatType()
        );
    }
} 