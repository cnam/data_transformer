<?php


namespace DT\Transformer;

use DT\Transformer\Type;

final class Types
{
    public static function factory(){
        return array(
            'array' => function(){
                new Type\ArrayType();
            },
            'json' => function(){
                new Type\JsonType();
            },
            'timestamp' => function(){
                new Type\Timestamp();
            },
            'bool' => function(){
                new Type\BoolType();
            },
            'integer' => function(){
                new Type\IntegerType();
            },
            'string' => function(){
                new Type\StringType();
            },
            'float' => function()
            {
                new Type\FloatType();
            }
        );
    }
} 