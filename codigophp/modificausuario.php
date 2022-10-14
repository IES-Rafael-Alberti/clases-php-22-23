<?php
require("conecta.php");

if(isset($_POST['nombre'])) {
    // recupera los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $foto = $_FILES["foto"]["name"];

    // asocia valores a esos nombres
    $datos = array("id" => $id,
                   "nombre" => $nombre,
                   "edad" => $edad,
                   "foto" => $foto
                  );

    // Comprueba que se ha subido una foto
    if($foto != "") {
        // copia el archivo temporal en fotos con su nombre original
        file_put_contents("fotos/$foto", file_get_contents($_FILES["foto"]["tmp_name"]));

        // prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
        $sql = "UPDATE usuario set nombre=:nombre, edad=:edad, foto=:foto WHERE id=:id";
    } else {
        // prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
        $sql = "UPDATE usuario set nombre=:nombre, edad=:edad WHERE id=:id";
        unset($datos["foto"]);
    }

    // comprueba que la sentencia SQL preparada está bien 
    $stmt = $conn->prepare($sql);
    // ejecuta la sentencia usando los valores
    if($stmt->execute($datos) != 1) {
        print("No se pudo actualizar usuario");
        exit(0);
    }
    
    print("Se ha actualizado el usuario");
    exit(0);
}

if(!isset($_GET["id"])) {
    print("Sin id no hay nada que hacer");
    exit(0);
}

// prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
$sql = "SELECT * FROM usuario WHERE id=:id";
// asocia valores a esos nombres
$datos = array("id" => $_GET['id']);
// comprueba que la sentencia SQL preparada está bien 
$stmt = $conn->prepare($sql);
$stmt->execute($datos);
$usuario = $stmt->fetch();
if(!$usuario) {
    print("Lo siento, pero no hay usuario con ese id");
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
    <input type="text" name="id" hidden value="<?php echo $_GET["id"]; ?>">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre" value="<?php echo $usuario["nombre"]; ?>">
    <label for="edad">Edad: </label>
    <input type="text" name="edad" id="edad" value="<?php echo $usuario["edad"]; ?>">
    <label for="foto">Foto: </label>
    <!-- Subida múltiple de archivos
    <input type="file" name="fotos[]" id="foto" multiple>
    -->
    <img width="50" src="fotos/<?php echo $usuario["foto"];?>">
    <input type="file" name="foto" id="foto">
    <input type="submit" value="Enviar">
</form>    
</body>
</html>