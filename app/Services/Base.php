<?php

namespace App\Services;

class Base
{
    protected static $initialValue = 1;

    public function calculateFinalValue()
    {
        return self::$initialValue * 10;
    }
}
