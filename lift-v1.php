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
    $minDistanceAbove = PHP_INT_MAX;

    foreach ($calledFloors as $floor) {
        if ($floor > $currentFloor) {
            $distance = abs($floor - $currentFloor);

            if ($distance < $minDistanceAbove) {
                $minDistanceAbove = $distance;
                $nearestFloorAbove = $floor;
            }
        }
    }

    // Find the nearest called floor below the current floor
    $nearestFloorBelow = null;
    $minDistanceBelow = PHP_INT_MAX;

    foreach ($calledFloors as $floor) {
        if ($floor < $currentFloor) {
            $distance = abs($floor - $currentFloor);

            if ($distance < $minDistanceBelow) {
                $minDistanceBelow = $distance;
                $nearestFloorBelow = $floor;
            }
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

