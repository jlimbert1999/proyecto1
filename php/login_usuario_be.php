<?php
session_start();
include 'conexion_be.php';
$conexion=$conexion = mysqli_connect("localhost", "root", "", "restaurante1");
$nombre_completo=$_POST['usuario'];
$correo =$_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena=hash('sha512', $contrasena);
$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo ='$correo'
and contrasena = '$contrasena'");
if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['correo']=$correo;
    header("location: ../admin/panel.php");
    exit;
}
else{
    echo'
    <script>
    alert("usuario no existe, porfavor  verifique los datos introducidos");
    window.location = "../index.php";
    </script>
    ';
    exit;
}
?>