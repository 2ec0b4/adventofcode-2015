<?php

require_once __DIR__ . '/common.php';

$nbCharsCode = $nbCharsCodeEncoded = 0;
$strings   = explode("\n", $input);
foreach($strings as $string) {
    $nbCharsCode        += mb_strlen($string);
    $nbCharsCodeEncoded += mb_strlen('"'.addcslashes($string,'"\\').'"');
}

echo 'Answer: '.($nbCharsCodeEncoded-$nbCharsCode);