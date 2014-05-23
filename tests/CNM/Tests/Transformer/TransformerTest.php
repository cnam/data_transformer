<?php
namespace CNM\Tests\Transformer;

use CNM\Transformer\Transformer;
use CNM\Metadata\Adapter\ArrayAdapter;

class TransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Transformer
     */
    protected $transformer;

    public function setUp()
    {
        $this->transformer = new Transformer();
    }

    /**
     * @dataProvider encodeDataProvider
     */
    public function testEncode($expected, $actual)
    {
        $metadata = require __DIR__ . "/../../Fixtures/Transformer/metadata.php";
        $adapter  = new ArrayAdapter($metadata);
        $expected = $this->transformer->encode($expected, $adapter);

        foreach ($actual as $k => $v) {
            $this->assertEquals($expected[$k], $v);
        }
    }

    /**
     * @dataProvider decodeDataProvider
     */
    public function testDecode($expected, $actual)
    {
        $metadata = require __DIR__ . "/../../Fixtures/Transformer/metadata.php";
        $adapter  = new ArrayAdapter($metadata);
        $expected = $this->transformer->decode($expected, $adapter);

        foreach ($actual as $k => $v) {
            $this->assertEquals($expected[$k], $v);
        }
    }

    public function encodeDataProvider()
    {
        return array(
            array(
                'expected' => array(
                    'integer'   => 123,
                    'bool'      => true,
                    'array'     => array('1', 2),
                    'json'      => array('2', '8'),
                    'float'     => 0.01,
                    'string'    => 'fasfasf rfas fasf',
                    'timestamp' => '1388651021',
                ),
                'actual'   => array(
                    'integer'   => '123',
                    'bool'      => 1,
                    'array'     => 'a:2:{i:0;s:1:"1";i:1;i:2;}',
                    'json'      => '["2","8"]',
                    'float'     => 0.01,
                    'string'    => 'fasfasf rfas fasf',
                    'timestamp' => '2014-01-02 12:23:41',
                )
            )
        );
    }

    public function decodeDataProvider()
    {
        return array(
            array(
                'expected' => array(
                    'integer'   => '123',
                    'bool'      => '1',
                    'array'     => 'a:2:{i:0;s:1:"1";i:1;i:2;}',
                    'json'      => '["2","8"]',
                    'float'     => 0.01,
                    'string'    => 'fasfasf rfas fasf',
                    'timestamp' => '2014-01-02 12:23:41',
                ),
                'actual'   => array(
                    'integer'   => 123,
                    'bool'      => true,
                    'array'     => array('1', 2),
                    'json'      => array('2', '8'),
                    'float'     => 0.01,
                    'string'    => 'fasfasf rfas fasf',
                    'timestamp' => '1388651021',
                )
            ),
        );
    }
} 