<?php

class Base
{
    protected static $initialValue = 1;

    public function calculateFinalValue()
    {
        return self::$initialValue * 10;
    }
}

trait DividesFinalValue
{
    public function calculateFinalValue()
    {
        return parent::calculateFinalValue() / 2;
    }
}

class Test extends Base
{
    use DividesFinalValue;

    protected static $initialValue = 4;
}

$finalValue = (new Test())->calculateFinalValue();

echo 'O valor final é ', $finalValue, '.';
