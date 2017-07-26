<?php

function printWithComma($values)
{
    for ($i= 0; $i < count($values); $i++) {
        echo($values[$i]);

        if ($i !== count($values) - 1) {
            echo(', ');
        }
    }
}

printWithComma([1,2,3,4,5,6,7,8]);