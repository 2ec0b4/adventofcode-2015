<?php

require_once __DIR__ . '/common.php';

$tables = makeTables(array_keys($happinesses));

echo 'Answer: '.getMaxHappiness($tables, $happinesses);