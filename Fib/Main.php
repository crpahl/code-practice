<?php

function fibSlow($num)
{
    if ($num == 1) {
        return 1;
    }

    if ($num == 0) {
        return 0;
    }

    return fibSlow($num - 1) + fibSlow($num - 2);
}

function fibIterative($num)
{
    $a = 0;
    $b = 1;
    $c = 0;

    for ($i = 1; $i < $num; $i++) {
        $c = $a + $b;
        $a = $b;
        $b = $c;
    }

    return $c;
}

echo(fibSlow(5) . PHP_EOL);
echo(fibSlow(10) . PHP_EOL);
echo(fibSlow(3) . PHP_EOL);

echo(fibIterative(5) . PHP_EOL);
echo(fibIterative(10) . PHP_EOL);
echo(fibIterative(3) . PHP_EOL);