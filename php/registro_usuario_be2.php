<?php
include 'conexion_be.php';
$correo=$_POST['correo'];
$usuario=$_POST['nombre_completo'];
$contrasena=$_POST['contrasena'];
$contrasena=hash('sha512', $contrasena);
$query="INSERT INTO clientes(email, pass, nombre) 
         VALUES('$correo', '$contrasena', '$usuario')";
         $verificar_correo = mysqli_query($conexion, "SELECT * FROM clientes WHERE email='$correo' ");
         if(mysqli_num_rows($verificar_correo) > 0){
              echo '
              <script>
              alert("este correo ya esta registrado, intenta con otro diferenet");
              window.location = "../login.php";
              </script>
              ';
              exit();
         }
         $verificar_usuario = mysqli_query($conexion, "SELECT * FROM clientes WHERE nombre='$usuario' ");
         if(mysqli_num_rows($verificar_usuario) > 0){
              echo '
              <script>
              alert("este usuario ya esta registrado, intenta con otro diferenet");
              window.location = "../login.php";
              </script>
              ';
              exit();
         }
         $ejecutar = mysqli_query($conexion, $query);
         if($ejecutar){
             echo '
             <script>
             alert("usuario registrado exitosamente");
             window.location="../login.php";
             </script>
             ';
         }
         else{
         echo '
             <script>
             alert("intenetlo de nuevo , registro fallido");
             window.location="../login.php";
             </script>
             ';
         }
         mysqli_close($conexion);

?>