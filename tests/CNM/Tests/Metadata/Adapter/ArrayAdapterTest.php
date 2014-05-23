<?php

namespace CNM\Tests\Metadata\Adapter;

use CNM\Metadata\MetadataAdapterInterface;
use CNM\Metadata\Adapter\ArrayAdapter;

class ArrayAdapterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MetadataAdapterInterface
     */
    private $metadataAdapter;
    private $metadata;

    public function setUp()
    {
        $this->metadata = require __DIR__ . '/../../../Fixtures/Transformer/metadata.php';
        $this->metadataAdapter = new ArrayAdapter($this->metadata);
        parent::setUp();
    }

    public function testAdapterInterface()
    {
        $this->assertInstanceOf('\CNM\Metadata\MetadataAdapterInterface', $this->metadataAdapter);
    }

    public function testGetTable()
    {
        $this->assertEquals($this->metadataAdapter->getTableName(), 'test');
    }

    /**
     * @dataProvider getFieldsDataProvider
     */
    public function testGetFields($fields)
    {
        $metadataFields = $this->metadataAdapter->getFields();
        foreach ($fields as $name=>$options) {
            $this->assertArrayHasKey($name, $metadataFields);
            $this->assertEquals($metadataFields[$name]['type'], $options['type']);
            $this->assertEquals($metadataFields[$name]['default'], $options['default']);
        }
    }

    /**
     * @dataProvider getFieldsDataProvider
     */
    public function testGetFieldsName($fields)
    {
        $metadataFields = $this->metadataAdapter->getFieldsName();
        foreach ($metadataFields as $name) {
            $this->assertArrayHasKey($name, $fields);
        }
    }

    /**
     * @dataProvider getFieldsDataProvider
     */
    public function testGetDefaultValues($fields)
    {
        $defaultValues = $this->metadataAdapter->getDefaultValues();
        foreach ($fields as $name => $options) {
            $this->assertArrayHasKey($name, $defaultValues);
            $this->assertEquals($defaultValues[$name],$options['default']);
        }
    }

    public function getFieldsDataProvider()
    {
        return array(
            array(
                array(
                    'integer'   => array(
                        'type'    => 'integer',
                        'default' => 0
                    ),
                    'bool'      => array(
                        'type'    => 'bool',
                        'default' => 0
                    ),
                    'array'     => array(
                        'type'    => 'array',
                        'default' => ''
                    ),
                    'json'      => array(
                        'type'    => 'json',
                        'default' => ''
                    ),
                    'float'     => array(
                        'type'    => 'float',
                        'default' => 0
                    ),
                    'string'    => array(
                        'type'    => 'string',
                        'default' => ''
                    ),
                    'timestamp' => array(
                        'type'    => 'timestamp',
                        'default' => ''
                    ),
                )
            )
        );
    }
} 