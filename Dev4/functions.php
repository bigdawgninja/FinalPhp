<?php


function ArrayToString(array $arrayToConvert) : string
{
    $stringResult = "";

    $first = false;
    foreach ($arrayToConvert as $i) {
        if ($first)
            $stringResult .= ', ';
        $stringResult .=  $i;
        $first = true;
    }

    return $stringResult;
}

?>