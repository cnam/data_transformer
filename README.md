# Library for transformation data from php to sql DB and inverse

# Usage

```php
<?php

require_once __DIR__ ."/vendor/autoload.php";

$transformer = new \CNM\Transformer\Transformer();

$metadata = array(
    'table' => 'tests',
    'fields' => array(
        'id' => array(
            'type' => 'integer',
            'default' => 0
        ),
        'name' => array(
            'type' => 'string',
            'default' => ''
        ),
        'options' => array(
            'type' => 'json',
            'default' => array()
        )
    )
);


$adapter =  new \CNM\Metadata\Driver\ArrayDriver($metadata);

$data = array(
    'name' => 'Test Data Transformer',
    'options' => array(
        'opt1' => true,
        'opt2' => false
    )
);

$encodedData = $transformer->encode($data, $adapter);

```

logic for inserting data to db

Get data from database

```php

$decodeData = $transformer->decode($data, $adapter);

```

and usage data

