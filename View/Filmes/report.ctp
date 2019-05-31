<?php
$setings = array(
    'template' => array(
        'body' => array(
            array('line' => array(
                array('cell' => array('fieldName' => 'Aliance.number')),
                array('cell' => array('fieldName' => 'Aliance.name'))
            ))
        )
    ),
    'records' => array(
        array('Aliance' => array('number' => 1, 'name' => 'Luke Skywalker')),
        array('Aliance' => array('number' => 2, 'name' => 'Leia Organa'))
    )
);

echo $this->Report->create($setings);
?>