<?php

function printGridAlternating($m, $n)
{
    echo('===========' . PHP_EOL);
    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if (($i * $m + $j) % 2 == 0) {
                echo('X');
            } else {
                echo('O');
            }
        }
        echo(PHP_EOL);
    }
}

function printGridAlterRow($m, $n)
{
    echo('===========' . PHP_EOL);
    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($i % 2 == 0) {
                if ($j % 2 == 0) {
                    echo('X');
                } else {
                    echo('O');
                }
            } else {
                if ($j % 2 == 0) {
                    echo('O');
                } else {
                    echo('X');
                }
            }
        }
        echo(PHP_EOL);
    }
}

/*printGridAlternating(3,3);
printGridAlternating(4,4);
printGridAlternating(5,6);*/

printGridAlterRow(3,3);
printGridAlterRow(4,4);
printGridAlterRow(5,6);