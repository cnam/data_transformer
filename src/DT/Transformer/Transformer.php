<?php

namespace DT\Transformer;

use DT\Metadata\MetadataAdapterInterface;
use TransformerInterface;

class Transformer implements TransformerInterface
{

    /**
     * @var array
     */
    protected $factory;

    public function __construct()
    {
        $this->factory = Types::factory();
    }

    /**
     * Преобразовать значение для записи в хранилище
     *
     * @param array                                 $data
     * @param \DT\Metadata\MetadataAdapterInterface $metaData
     * @param array                                 $options
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function encode($data, MetadataAdapterInterface $metaData, array $options = array())
    {
        $data = array();

        foreach ($metaData->getFields() as $name => $options) {
            if (!array_key_exists($options['type'], $this->factory)) {
                throw new \Exception('Not corrected field type correct types: '.implode(',',array_keys($this->factory)));
            }
            $data[$name] = $this->factory[$options['type']]->encode($data[$name]);
        }

        return array_merge($data, $metaData->getDefaultValues());
    }

    /**
     * Преобразование полученное значение из хранилища
     *
     * @param array                                 $data
     * @param \DT\Metadata\MetadataAdapterInterface $metaData
     * @param array                                 $options
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function decode($data, MetadataAdapterInterface $metaData, array $options = array())
    {
        $data = array();

        foreach ($metaData->getFields() as $name => $options) {
            if (!array_key_exists($options['type'], $this->factory)) {
                throw new \Exception('Not corrected field type correct types: '.implode(',',array_keys($this->factory)));
            }
            $data[$name] = $this->factory[$options['type']]->decode($data[$name]);
        }

        $data = array_merge($data, $metaData->getDefaultValues());

        return $data;
    }
}