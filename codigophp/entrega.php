<?php
if(isset($_POST['nombre'])) {
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

    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $foto = $_FILES["foto"]["name"];

    file_put_contents("fotos/$foto", file_get_contents($_FILES["foto"]["tmp_name"]));

    // inyectable
    //$sql = "INSERT INTO usuario (nombre, edad, foto) values ('$nombre', $edad, '$foto')";
    $sql = "INSERT INTO usuario (nombre, edad, foto) values (:nombre, :edad, :foto)";
    $datos = array("nombre" => $nombre,
                   "edad" => $edad,
                   "foto" => $foto
                  );
    $stmt = $conn->prepare($sql);
    if($stmt->execute($datos) != 1) {
        print("No se pudo dar de alta");
        exit(0);
    }
    
    //print_r($_POST);
    //print_r($_FILES);
    //file_put_contents("fotos/perroooo", file_get_contents($_FILES["foto"]["tmp_name"]));
    
    print("<br><img src='/fotos/$foto'><br>");
    
    exit(0);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre">
    <label for="edad">Edad: </label>
    <input type="text" name="edad" id="edad">
    <label for="foto">Foto: </label>
    <input type="file" name="foto" id="foto">
    <input type="submit" value="Enviar">
</form>    
</body>
</html>