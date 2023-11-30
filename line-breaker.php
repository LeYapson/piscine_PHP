<?php

function breakLines($string, $maxLength) {
    // Explode the input string into an array of words
    $words = explode(' ', $string);

    // Initialize variables
    $currentLine = '';
    $result = '';

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
    $result .= rtrim($currentLine);

    return $result;
}