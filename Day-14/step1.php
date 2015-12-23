<?php

require_once __DIR__ . '/common.php';

$reindeers = [];
$rows   = explode("\n", $input);
foreach($rows as $row) {
    $matches    = [];
    preg_match('@^([\w]+) can fly ([\d]+) km/s for ([\d]+) seconds, but then must rest for ([\d]+) seconds.$@im', $row, $matches);
    
    $reindeers[$matches[1]]  = [
        'speed' => intval($matches[2]),
        'duration' => intval($matches[3]),
        'rest' => intval($matches[4]),
        'running' => 0,
        'resting' => 0
    ];
}

$distances  = [];
$end    = 2503;
for($i=1;$i<=$end;$i++) {
    foreach($reindeers as $name => &$reindeer) {
        if( $reindeer['resting'] == 0 && $reindeer['running'] < $reindeer['duration']
            || $reindeer['resting'] > $reindeer['rest'] ) {
            $distances[$name]   += $reindeer['speed'];
            
            $reindeer['resting']    = 0;
            $reindeer['running']++;
        } else {
            $reindeer['running']    = 0;
            $reindeer['resting']++;
        }
    }
}

echo 'Answer: '.max($distances);