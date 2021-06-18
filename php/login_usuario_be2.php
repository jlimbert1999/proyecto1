<?php
session_start();
include_once "conexion_be.php";
$conexion = mysqli_connect("localhost", "root", "", "restaurante1");
$correo =$_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena=hash('sha512', $contrasena);
$validar_login = mysqli_query($conexion, "SELECT * FROM clientes WHERE email ='$correo'
and pass = '$contrasena'");
$row=mysqli_fetch_assoc($validar_login);
if(mysqli_num_rows($validar_login) > 0 && $row){
    $_SESSION['idCliente']=$row['id'];
    $_SESSION['emailCliente']=$row['email'];
    $_SESSION['nombreCliente']=$row['nombre'];
    header("location: ../indexx.php");
}

else{
    echo'
    <script>
    alert("usuario no existe, porfavor  verifique los datos introducidos");
    window.location = "../indexx.php";
    </script>
    ';
    exit;
}
?>