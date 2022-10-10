<?php
$servidor="db"; // porque es el nombre asociado en docker-compose
$usuario="protectora";
$clave= "pestillo";
$bd="protectora";
try {
    // mysql es el gestor de Base de datos
    $conn = new PDO("mysql:host=$servidor;dbname=$bd", $usuario, $clave);
    // Establece los atributos de los reportes de errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión satisfactoria";
} catch(PDOException $e) {
    echo ( "Error de conexión: " . $e->getMessage());
    exit(0);
}

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