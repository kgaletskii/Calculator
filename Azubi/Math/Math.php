<?php

namespace Azubi\Math;

class Math implements MathInterface
{
    function add(float $value1, float $value2): float
    {
        return $value1 + $value2;
    }

    function subtract(float $value1, float $value2): float
    {
        return $value1 - $value2;
    }
    function multiply(float $value1, float $value2): float
    {
        return $value1 * $value2;
    }
    function divide(float $value1, float $value2): float
    {
        return $value1 / $value2;
    }

    function calculate($value1, $value2, $operation)
    {
        switch ($operation) {
            case "Add":
                return $this->add($value1, $value2);
            case "Subtract":
                return $this->subtract($value1, $value2);
            case "Multiply":
                return $this->multiply($value1, $value2);
            case "Divide":
                if ($value2 == 0) {
                    return 'Devision by zero is not possible.';
                }
                return $this->divide($value1, $value2);
            default:
                return "Error: incorrect operation.";
        }
    }
}
