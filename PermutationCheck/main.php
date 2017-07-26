<?php

function permutationCheck($string1, $string2) {
    if (count($string1) !== count($string2)) {
        return false;
    }

    if (strcmp(sortString($string1), sortString($string2)) === 0) {
        return true;
    }

    return false;
}

function sortString($string) {
    $string = str_split($string);
    sort($string);

    return implode('', $string);
}

var_export(permutationCheck('abc', 'cba'));
var_export(permutationCheck('abc', 'cbb'));