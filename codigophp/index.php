<?php
require("conecta.php");

$usuarios = $conn->query("Select * from usuario");
$usuarios_assoc = $usuarios->fetchAll(PDO::FETCH_ASSOC);
print_r($usuarios_assoc);
print("<br>");
foreach($usuarios_assoc as $user) {
    print($user["nombre"]);
    print("<br>");
}

$mascotas = $conn->query("Select * from mascota");


// Opción 
while($mascota = $mascotas->fetchObject()) {
    print($mascota->nombre);
    print("<br>");
}