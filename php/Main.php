<?php

require('GraphStringSolver.php');

$graphStringSolver = new GraphStringSolver();

$triplets = [
    ['t', 'u', 'p'],
    ['w', 'h', 'i'],
    ['t', 's', 'u'],
    ['a', 't', 's'],
    ['h', 'a', 'p'],
    ['t', 'i', 's'],
    ['w', 'h', 's']
];

$secret = $graphStringSolver->recoverSecret($triplets);
echo($secret . PHP_EOL);

$triplets = [
    ['f', 'u', 't'],
    ['u', 'n', 'm'],
    ['m', 'e', 's'],
    ['i', 'm', 's'],
    ['n', 't', 'm'],
    ['f', 't', 'i'],
    ['n', 'i', 'e']
];

$secret = $graphStringSolver->recoverSecret($triplets);
echo($secret . PHP_EOL);