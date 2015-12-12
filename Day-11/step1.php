<?php

require_once __DIR__ . '/common.php';

while(!valid($input)) {
    $input  = increment($input, $stringLength-1);
}

echo 'Answer: '.$input;