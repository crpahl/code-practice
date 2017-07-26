<?php

function URLify($string) {
    return str_replace(' ', '%20', trim($string));
}

echo(URLify('a b c   ') . PHP_EOL);
echo(URLify('  a  b  c   ') . PHP_EOL);
echo(URLify('a   b   c  ddd') . PHP_EOL);