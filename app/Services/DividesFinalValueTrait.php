<?php

namespace App\Services;

trait DividesFinalValueTrait
{
    public function calculateFinalValue()
    {
        return parent::calculateFinalValue() / 2;
    }
}