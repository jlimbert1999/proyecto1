<?php
session_start();
if(!isset($_SESSION['correo'])){
    echo'<script>
    alert("POR FAVOR DEBES INICIAR SESION");
    window.location = "index.php";
    </script>';
    header("location: index.php");
    session_destroy();
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BIENVENIDO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>BIENVENIDOA MI MUNDO</h1>
    <a href="php/cerrar_sesion.php">cerrar sesion</a>
</body>
</html>