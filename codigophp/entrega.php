<?php
if(isset($_POST['nombre'])) {
    print_r($_POST);
    print_r($_FILES);
    file_put_contents("fotos/perroooo", file_get_contents($_FILES["foto"]["tmp_name"]));
    ?>
    <br><img src="/fotos/perroooo"><br>
    <?php
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