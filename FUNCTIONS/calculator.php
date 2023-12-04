<?php

function calc($expression): int 
{
    // Validate the expression
    if (!preg_match('/^[\d\s\(\)\+\-]*$/', $expression)) {
        // Return an error if the expression contains invalid characters
        return "Invalid expression";
    }

    // Remove spaces from the expression
    $expression = str_replace(' ', '', $expression);

    // Use eval to evaluate the expression
    @eval('$result = ' . $expression . ';');

    // Check for errors during evaluation
    if (error_get_last() !== null) {
        // Return an error if there is an issue with the expression
        return "Error in expression";
    }

    // Return the result as an integer
    return (int)$result;
}
