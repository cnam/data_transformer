<?php

namespace CNM\Metadata\Driver;

use CNM\Metadata\MetadataDriverInterface;

class ArrayAdapter implements MetadataDriverInterface
{
    protected $metadata;

    public function __construct(array $metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return array
     */
    protected function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Название таблицы для маппера
     *
     * @return array
     */
    public function getTableName()
    {
        $metadata = $this->getMetaData();
        return $metadata['table'];
    }

    /**
     * Название полей в базе данных
     *
     * @return array
     */
    public function getFieldsName()
    {
        return  array_keys($this->getFields());
    }

    /**
     * Дефолтные значения полей для метаданных
     *
     * @return array
     */
    public function  getDefaultValues()
    {
        $metadata = $this->getMetaData();

        $defaultValues = array();

        foreach ($metadata['fields'] as $fieldName => $fieldOptions) {
            $defaultValues[$fieldName] = $fieldOptions['default'];
        }

        return $defaultValues;
    }

    /**
     * Массив полей
     *
     * @return array
     */
    public function getFields()
    {
        $metadata = $this->getMetaData();
        return $metadata['fields'];
    }
}