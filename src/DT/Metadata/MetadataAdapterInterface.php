<?php


namespace DT\Metadata;


interface MetadataAdapterInterface
{
    /**
     * Имя таблицы
     *
     * @return string
     */
    public function getTableName();

    /**
     * Имена полей в таблице
     *
     * @return array
     */
    public function getFieldsName();

    /**
     * Значение для полей по умолчанию
     *
     * @return array
     */
    public function getDefaultValues();

    /**
     * Поля из таблицы
     *
     * @return array
     */
    public function getFields();
}