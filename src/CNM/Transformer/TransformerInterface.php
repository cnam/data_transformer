<?php

namespace CNM\Transformer;

use CNM\Metadata\MetadataDriverInterface;

interface TransformerInterface
{
    /**
     * Метод для трансформации из текущего вида данных
     * в необходимый для сохранения в базу
     *
     * @param      array               $data данные для преобразования
     * @param MetadataDriverInterface $metadata
     * @param array                    $options
     *
     * @return mixed
     */
    public function encode($data, MetadataDriverInterface $metadata, array $options = array());

    /**
     * Метод для преобразование данных из базы, в корректные для работы типы
     *
     * @param               array      $data данные для преобразования
     * @param MetadataDriverInterface $metadata
     * @param array                    $options
     *
     * @return mixed
     */
    public function decode($data, MetadataDriverInterface $metadata, array $options = array());
}