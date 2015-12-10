<?php

require_once __DIR__ . '/common.php';

$positive   = substr_count($input, '(');
$negative   = substr_count($input, ')');

echo 'Answer: '.($positive-$negative);