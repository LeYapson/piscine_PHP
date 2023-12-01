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
    if ($currentFloor === $requestedFloor || $currentFloor === getNearestNumberInArray($currentFloor, $calledFloors)) {
        return 0;
    }

    // handle the case when there are no called floors
    $nearestFloor = getNearestNumberInArray($currentFloor, $calledFloors);
    if ($nearestFloor === null) {
        return 0;
    }

    // return 1 if the elevator needs to go up
    elseif ($currentFloor < $requestedFloor || $currentFloor < $nearestFloor) {
        return 1;
    }
    // return -1 if the elevator needs to go down
    else {
        return -1;
    }
}


// Example usage:
$currentFloor = 1;
$requestedFloor = null;
$calledFloors = [];

$nextFloor = getFloor($currentFloor, $requestedFloor, $calledFloors);
$direction = getDirection($currentFloor, $requestedFloor, $calledFloors);

echo "Next floor: $nextFloor, Direction: $direction\n";