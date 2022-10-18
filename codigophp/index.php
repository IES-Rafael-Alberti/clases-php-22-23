<?php
require("testlogin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
Usuarios:  <a href="altausuario.php"><i class='fa-solid fa-plus'></i></a>
<?php
require("conecta.php");
$usuarios = $conn->query("Select * from usuario");
$usuarios_assoc = $usuarios->fetchAll(PDO::FETCH_ASSOC);
print("<table class='users'>");
foreach($usuarios_assoc as $user) {
    print("<tr>");
    print("<td>");
    print("<a href='modificausuario.php?id=".$user["id"]."'><i class='fa-solid fa-pen-to-square'></i></a>");
    print("</td>");
    print("<td>");
    print($user["nombre"]);
    print("</td>");
    print("<td>");
    print($user["edad"]);
    print("</td>");
    print("</tr>");
}
print("</table>");
?>

Mascotas: <i class='fa-solid fa-plus'></i>

<?php
$mascotas = $conn->query("Select * from mascota");


// Opción 
print("<table class='pets'>");
while($mascota = $mascotas->fetchObject()) {
    print("<tr>");
    print("<td>");
    print($mascota->nombre);
    print("</td>");
    print("</tr>");
}
print("</table>");
?>
</body>
</html>