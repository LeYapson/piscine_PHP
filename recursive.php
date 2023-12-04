<?php

function factorial($n): float {
    // Base case: factorial of 0 or 1 is 1
    if ($n == 0 || $n == 1) {
        return 1;
    } else {
        // Recursive case: n! = n * (n-1)!
        return $n * factorial($n - 1);
    }
}

// Example usage:
$number = 5;
$result = factorial($number);
echo "The factorial of $number is: $result";
