<?php

function factorial(float $n): float {
    if ($n === 0) {
        return 1;
    }

    return $n * factorial($n - 1);
}