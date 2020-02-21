<?php
$bmw = [
    "model" => "X5",
    "speed" => 120,
    "doors" => 5,
    "year" => "2015",
];
$toyota = [
    "model" => "SG",
    "speed" => 300,
    "doors" => 3,
    "year" => "2007",
];
$opel = [
    "model" => "Astra",
    "speed" => 100,
    "doors" => 5,
    "year" => "2018",
];
$cars = [
    "bmw" => $bmw,
    "toyota" => $toyota,
    "opel" => $opel
];
foreach ($cars as $brand => $car) {
    echo $brand . "\n";
    echo $car['model'] . ' ';
    echo $car['speed'] . ' ';
    echo $car['doors'] . ' ';
    echo $car['year'] . "\n";
}

