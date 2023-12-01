<?php

function getFloor(int $currentFloor, ?int $requestedFloor, array $calledFloors): ?int
{
    // If a floor is requested, go to that floor
    if ($requestedFloor !== null) {
        return $requestedFloor;
    }

    // If no floor is requested, check for called floors
    if (empty($calledFloors)) {
        return null;
    }

    // Find the nearest called floor above the current floor
    $nearestFloorAbove = null;

    foreach ($calledFloors as $floor) {
        if ($floor > $currentFloor && ($nearestFloorAbove === null || abs($floor - $currentFloor) < abs($nearestFloorAbove - $currentFloor))) {
            $nearestFloorAbove = $floor;
        }
    }

    // Find the nearest called floor below the current floor
    $nearestFloorBelow = null;

    foreach ($calledFloors as $floor) {
        if ($floor < $currentFloor && ($nearestFloorBelow === null || abs($floor - $currentFloor) < abs($nearestFloorBelow - $currentFloor))) {
            $nearestFloorBelow = $floor;
        }
    }

    // If there is a called floor closer than the requested floor, go to that floor
    if ($nearestFloorAbove !== null && abs($nearestFloorAbove - $currentFloor) < abs($requestedFloor - $currentFloor)) {
        return $nearestFloorAbove;
    } elseif ($nearestFloorBelow !== null && abs($nearestFloorBelow - $currentFloor) < abs($requestedFloor - $currentFloor)) {
        return $nearestFloorBelow;
    }

    // Otherwise, there are no called floors closer than the requested floor, so go to the requested floor
    return $requestedFloor;
}

function getDirection(int $currentFloor, ?int $requestedFloor, array $calledFloors): int
{
    // If no movement is needed
    if ($requestedFloor === null && empty($calledFloors)) {
        return 0;
    }

    // If a floor is requested
    if ($requestedFloor !== null) {
        if ($requestedFloor > $currentFloor) {
            return 1;
        } elseif ($requestedFloor < $currentFloor) {
            return -1;
        } else {
            return 0;
        }
    }

    // If there are called floors, go to the nearest one
    $nearestFloor = getFloor($currentFloor, null, $calledFloors);

    if ($nearestFloor === null) {
        return 0;
    } elseif ($nearestFloor > $currentFloor) {
        return 1;
    } else {
        return -1;
    }
}

