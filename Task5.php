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
$array = [
    "bmw" => $bmw,
    "toyota" => $toyota,
    "opel" => $opel
];
$nameofmark = array_keys($array);
for ($i = 0; $i < 3; $i++) {
    echo "Car " . "$nameofmark[$i]" . "<br>";
    foreach ($array[$nameofmark[$i]] as $key => $value) {
        echo $value . " ";
    }
    echo "<br>";
}

