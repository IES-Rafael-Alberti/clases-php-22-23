<?php

$milista[0] = "0";
$milista[1] = "1";
$milista[2] = "2";
$milista[3] = "3";

$milista2 = ["1", "3", "5"];

$milista3 = array("1", "4", "8");

print_r($milista); print("<br>");
print_r($milista2); print("<br>");
print_r($milista3); print("<br>");

print($milista2[2]); print("<br>");

// Python y JSON
// {"clave1": valor1, ...}

$diccionario = array( "clave1" => "2",
                      "clave2" => "5");

foreach(array_keys($diccionario) as $elemento) {
    print_r($elemento); print("<br>");
}