<?php

/**
 * Calculate factorial of an integer
 * @param  int  $number  Number to be calculated
 * @return int
 */
function getFactorial(int $number) : int
{
    $factorial = 0;

    for ($i = 1; $i <= $number; $i++) {
        $factorial += $i;
    }

    return $factorial;
}

$number = 20;
echo 'O Fatorial de ', $number, ' é ', getFactorial($number), '.';
