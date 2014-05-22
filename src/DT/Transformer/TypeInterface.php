<?php

namespace DT\Transformer;

interface TypeInterface
{
    /**
     * Преобразовать значение для записи в хранилище
     *
     * @param $value
     *
     * @return mixed
     */
    public function encode($value);

    /**
     * Преобразование полученное значение из хранилища
     *
     * @param $value
     *
     * @return mixed
     */
    public function decode($value);
}