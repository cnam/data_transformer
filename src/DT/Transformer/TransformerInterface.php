<?php

namespace DT\Transformer;

use DT\Metadata\MetadataAdapterInterface;

interface TransformerInterface
{
    /**
     * Метод для трансформации из текущего вида данных
     * в необходимый для сохранения в базу
     *
     * @param      array               $data данные для преобразования
     * @param MetadataAdapterInterface $metadata
     * @param array                    $options
     *
     * @return mixed
     */
    public function encode($data, MetadataAdapterInterface $metadata, array $options = array());

    /**
     * Метод для преобразование данных из базы, в корректные для работы типы
     *
     * @param               array      $data данные для преобразования
     * @param MetadataAdapterInterface $metadata
     * @param array                    $options
     *
     * @return mixed
     */
    public function decode($data, MetadataAdapterInterface $metadata, array $options = array());
}