<?php

require_once __DIR__ . '/common.php';

walkAndSum(json_decode($input), $sum, true);

echo 'Answer: '.$sum;