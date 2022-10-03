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
while($usuario = $usuarios->fetchObject()) {
    print($usuario->nombre);
    print("<br>");
}