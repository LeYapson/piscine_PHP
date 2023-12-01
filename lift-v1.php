<?php

function getFloor($currentFloor, $requestedFloor, $calledFloors): ?int
{
    // If there is a requested floor, go directly to that floor
    if ($requestedFloor !== null) {
        return (int) $requestedFloor;
    }
    // print to terminal

    // If there are called floors, go to the nearest called floor
    if (!empty($calledFloors)) {
        $nearestFloor = getNearestNumberInArray($currentFloor, $calledFloors);

        return (int) $nearestFloor;
    }

    // If there are no requested or called floors, stay on the current floor
    return (int) $currentFloor;
}

function getDirection($currentFloor, $requestedFloor, $calledFloors): int
{
    //return 0 if no mvmt is needed
    if ($currentFloor === $requestedFloor || $currentFloor === $calledFloors) {
        return 0;
        //return 1 if the elevator go up
    }elseif ($currentFloor < $requestedFloor || $currentFloor < $calledFloors) {
        return 1;
        //return -1 if the elevator go down
    }else {
        return -1;
    }
    
    
}

// return an integer
// take as input an integer and an array of integers
// return the integer in the array that is closest to the input integer
function getNearestNumberInArray($numbers, $reference) {
    $nearest = null;
    $nearestDistance = null;

    foreach ($reference as $number) {
        $distance = abs($number - $numbers);

        if ($nearestDistance === null || $distance < $nearestDistance) {
            $nearest = $number;
            $nearestDistance = $distance;
        }
    }

    return $nearest;
}

// Example usage:
$currentFloor = 9;
$requestedFloor = 5;
$calledFloors = [-2, 6];

$nextFloor = getFloor($currentFloor, $requestedFloor, $calledFloors);
$direction = getDirection($currentFloor, $requestedFloor, $calledFloors);

echo "Next floor: $nextFloor, Direction: $direction\n";