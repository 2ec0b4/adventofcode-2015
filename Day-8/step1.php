<?php

require_once __DIR__ . '/common.php';

$nbCharsCode = $nbCharsMemory = 0;
$strings   = explode("\n", $input);
foreach($strings as $string) {
    $nbCharsCode    += mb_strlen($string);
    eval("\$string = $string;");
    $nbCharsMemory  += mb_strlen($string);
}

echo 'Answer: '.($nbCharsCode-$nbCharsMemory);