<?php

function breakLines($string, $maxLength): string
{
    // Split the input string into lines
    $lines = explode("\n", $string);

    // Initialize variables
    $result = '';

    // Iterate through each line
    foreach ($lines as $line) {
        // Explode the line into an array of words
        $words = explode(' ', $line);
        $currentLine = '';

        // Iterate through each word
        foreach ($words as $word) {
            // Check if adding the word to the current line exceeds the maximum length
            if (strlen($currentLine . $word) <= $maxLength) {
                // If not, add the word to the current line
                $currentLine .= $word . ' ';
            } else {
                // If it exceeds the maximum length, start a new line
                $result .= rtrim($currentLine) . "\n";
                $currentLine = $word . ' ';
            }
        }

        // Add the last line to the result
        $result .= rtrim($currentLine) . "\n";
    }

    // Remove the trailing newline character
    $result = rtrim($result);

    return $result;
}