<?php

require_once __DIR__ . '/common.php';

$guests = array_keys($happinesses);
foreach($guests as $guest) {
    $happinesses[$guest]['me'] = $happinesses['me'][$guest] = 0;
}

$tables = makeTables(array_keys($happinesses));

echo 'Answer: '.getMaxHappiness($tables, $happinesses);