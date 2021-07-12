<?php

/**
 * Get how many numbers are multiples of 5 in an array of int
 * @param  int  ...$number  Array of numbers
 * @return int
 */
function getMultiples(int ...$numbers) : int
{
    $numbers = array_values($numbers);
    asort($numbers);

    $last = $numbers[count($numbers) - 1];
    $multiples = 0;

    for ($i = 5; $i <= $last; $i += 5) {
        if (in_array($i, $numbers)) {
            $multiples++;
        }
    }

    return $multiples;
}

$list = [1,2,5,6,7,10,15,18,20];
echo 'Na lista: ', implode(',', $list), '. Há ', getMultiples(...$list), ' múltiplos de 5.';
