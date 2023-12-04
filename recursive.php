<?php

function factorial(float $n): int|float
{
    if ($n === 0 || $n === 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

echo factorial(45);