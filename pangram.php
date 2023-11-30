<?php

function isPangram($sentence): bool
{
    // Convert the sentence to lowercase for case insensitivity
    $lowercaseSentence = strtolower($sentence);

    // Create an array to track the presence of each letter
    $alphabet = range('a', 'z');
    $letterPresence = array_fill_keys($alphabet, false);

    // Iterate through each character in the sentence
    for ($i = 0; $i < strlen($lowercaseSentence); $i++) {
        $char = $lowercaseSentence[$i];
        // Check if the character is a letter and mark its presence
        if (ctype_alpha($char)) {
            $letterPresence[$char] = true;
        }
    }

    // Check if all letters are present
    return !in_array(false, $letterPresence, true);
}

