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
    return null;
}

function getNearestNumberInArray($numbers, $reference) {
    if (empty($reference)) {
        return null;
    }

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

function getDirection($currentFloor, $requestedFloor, $calledFloors): int
{
    // return 0 if no movement is needed
    if ($currentFloor === $requestedFloor) {
        return 0;
    }

    // find the nearest floor among the called floors
    $nearestFloor = getNearestNumberInArray($currentFloor, $calledFloors);

    // return 1 if the elevator needs to go up
    if ($currentFloor < $requestedFloor || $currentFloor < $nearestFloor) {
        return 1;
    }
    // return -1 if the elevator needs to go down
    else {
        return -1;
    }
    // handle the case when there are no called floors
    if (empty($calledFloors)) {
        return 0;
    }
}



// Example usage:
$currentFloor = 0;
$requestedFloor = 1;
$calledFloors = [];

$nextFloor = getFloor($currentFloor, $requestedFloor, $calledFloors);
$direction = getDirection($currentFloor, $requestedFloor, $calledFloors);

echo "Next floor: $nextFloor, Direction: $direction\n";