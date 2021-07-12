<?php

namespace App\Helpers;

class TestFase1
{
    /**
     * Get how many numbers are multiples of 5 in an array of int
     * @param  int  ...$number  Array of numbers
     * @return int
     */
    static function getMultiples(int ...$numbers) : int
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

    /**
     * Calculate factorial of an integer
     * @param  int  $number  Number to be calculated
     * @return int
     */
    static function getFactorial(int $number) : int
    {
        $factorial = 0;

        for ($i = 1; $i <= $number; $i++) {
            $factorial += $i;
        }

        return $factorial;
    }
}
