<?php

function convertSize($value, $precision = 2) {

    $typeByte = [' B',' KB',' MB',' GB',' TB',' PB',' EB',' ZB',' YB',' HB'];
    $valTypByte = 0;

    while ($value > 1024){
        $value = $value / 1024;
        $valTypByte ++;
    }

    $result = round($value, $precision) . $typeByte[$valTypByte];

    return $result;
}

echo convertSize(1020).'<br/>';

echo convertSize(100000000506);
