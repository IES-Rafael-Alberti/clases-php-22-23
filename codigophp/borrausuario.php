<?php
require("conecta.php");

$usuario = $_GET['id'];

// prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
$sql = "DELETE FROM usuario WHERE id = :idusuario";
// asocia valores a esos nombres
//$datos = array("idusuario" => $usuario);
// comprueba que la sentencia SQL preparada está bien 
$stmt = $conn->prepare($sql);
// método alternativo con bindParam
$stmt->bindParam(":idusuario", $usuario);
// ejecuta la sentencia usando los valores
//if($stmt->execute($datos) != 1) {
if($stmt->execute() != 1) {
    print("No se pudo dar de baja");
    exit(0);
}

header("Location: index.php");