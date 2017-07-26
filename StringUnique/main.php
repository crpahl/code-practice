<?php

function allUnique($string)
{
    $charMap = [];

    foreach(str_split($string) as $character) {
        if (array_key_exists($character, $charMap)) {
            $charMap[$character] += 1;
        } else {
            $charMap[$character] = 1;
        }

        if($charMap[$character] > 1) {
            echo('false' . PHP_EOL);
            return;
        }
    }

    echo('true'. PHP_EOL);
}

allUnique('abcde');
allUnique('abcdee');
allUnique('aabbcde');