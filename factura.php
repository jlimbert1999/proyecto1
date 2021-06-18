
<?php
$total=$_REQUEST['total']??'';
$cantidad=$_REQUEST['cantidad[]']??'';
$precio=$_REQUEST['precio[]']??'';
include 'ajax/stripe/init.php';
include 'php/conexion_be.php';
$conexion = mysqli_connect("localhost", "root", "", "restaurante1");
echo "el precio total por pedido es:".$total;
$querycompra="INSERT into detalle_venta (cantidad) '".$total."'";
?>
<!-- Creat Countdown Timer -->
<article class="clock" id="model3">
  <h3></h3>

  <div class="count">
    <div id="timer"></div>
  </div>
</article>
<?php

?>
    
