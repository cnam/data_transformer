<?php

namespace CNM\Transformer;

use CNM\Metadata\MetadataAdapterInterface;

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
     * @param \CNM\Metadata\MetadataAdapterInterface $metaData
     * @param array                                 $options
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function encode($data, MetadataAdapterInterface $metaData, array $options = array())
    {
        $data = array_merge($metaData->getDefaultValues(), $data);
        foreach ($metaData->getFields() as $name => $options) {
            $type = strtolower($options['type']);
            if (!array_key_exists($type, $this->factory)) {
                throw new \Exception('Not corrected field type correct types: '.implode(',',array_keys($this->factory)));
            }
            $data[$name] = $this->factory[$type]->encode($data[$name]);
        }

        return $data;
    }

    /**
     * Преобразование полученное значение из хранилища
     *
     * @param array                                 $data
     * @param \CNM\Metadata\MetadataAdapterInterface $metaData
     * @param array                                 $options
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function decode($data, MetadataAdapterInterface $metaData, array $options = array())
    {
        $data = array_merge($metaData->getDefaultValues(), $data);
        foreach ($metaData->getFields() as $name => $options) {
            $type = strtolower($options['type']);
            if (!array_key_exists($type, $this->factory)) {
                throw new \Exception('Not corrected field type correct types: '.implode(',',array_keys($this->factory)));
            }
            $data[$name] = $this->factory[$type]->decode($data[$name]);
        }

        return $data;
    }
}