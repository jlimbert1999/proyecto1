
<?php
include_once "php/conexion_be.php";
if(isset($_SESSION['idCliente'])){
    if(isset($_REQUEST['guardar'])){
        $nombreCli=$_REQUEST['nombreCli']??'';
        $emailCli=$_REQUEST['emailCli']??'';
        $direccionCli=$_REQUEST['direccionCli']??'';
        $queryCli="UPDATE clientes set nombre='$nombreCli',email='$emailCli', direccion='$direccionCli' where id='".$_SESSION['idCliente']."'";   
        $resCli=mysqli_query($conexion,$queryCli);
        $nombreRec=$_REQUEST['nombreRec']??'';
        $emailRec=$_REQUEST['emailRec']??'';
        $direccionRec=$_REQUEST['direccionRec']??'';
        $queryRec="INSERT INTO recibe (nombre,email,direccion,idCli) VALUES ('$nombreRec','$emailRec','$direccionRec','".$_SESSION['idCliente']."')
        ON DUPLICATE KEY UPDATE
        nombre='$nombreRec',email='$emailRec', direccion='$direccionRec';";   
        $resRec=mysqli_query($conexion,$queryRec);
        if($resCli && $resRec){
            echo '<meta http-equiv="refresh" content="0; url=indexx.php?modulo=pasarela" />';
        }
        else
        {
            ?>
            <div class="alert alert-primary" role="alert">
            error
            </div>
        <?php
        }
        
    }
    $queryCli="SELECT nombre,email,direccion from clientes where id='".$_SESSION['idCliente']."';";
    $resCli=mysqli_query($conexion,$queryCli);
    $rowCli=mysqli_fetch_assoc($resCli);

   $queryRec="SELECT nombre,email,direccion from recibe where idCli='".$_SESSION['idCliente']."';";
   $resRec=mysqli_query($conexion,$queryRec);
   $rowRec=mysqli_fetch_assoc($resRec);
    
    
?>
    <form method="post">
<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <h3>Datos del cliente</h3>
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="nombreCli" id="nombreCli" class="form-control" value="<?php echo $rowCli['nombre']?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="emailCli" id="emailCli" class="form-control" readonly="readonly" value="<?php echo $rowCli['email']?>">
        </div>
            <div class="form-group">
                <label for="">Direccion</label>
                <textarea name="direccionCli" id="direccionCli" class="form-control" row="3"> <?php echo $rowCli['direccion']?></textarea>
            </div>
        </div>
        <div class="col-6">
            <h3>Datos de quien recibe</h3>
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="nombreRec" id="nombreRec" class="form-control" value="<?php echo $rowRec['nombre']?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="emailRec" id="emailRec" class="form-control" value="<?php echo $rowRec['email']?>">
        </div>
            <div class="form-group">
                <label for="">Direccion</label>
                <textarea name="direccionRec" id="direccionRec" class="form-control" row="3" value="<?php echo $rowRec['direccion']?>"> </textarea>
            </div>
             <div class="form-check">
             <label class="form-check-label">
                 <input type="checkbox" class="form-check-input" id="jalar">
                 jalar datos del cliente
             </label>
        </div>
        <li class="nav-item ">
            <a class="nav-link" href="https://www.google.com/maps"
              >obten tu ubicacion</a
            >
          </li>
          <section>
      <div class="container mt-5 mb-5 text-center">
        <h4>
          ENTRA AL MAPA PARA QUE SE ACTIVE TU UBICACION
        </h4>
        <p>
    COPIA LA URL UBICACION Y PONLO EN EL APARTADO DE "UBICACION" PARA ENVIAR TU PEDIDO
        </p>
        <div class="responsive-iframe">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3599.2068433698746!2d-66.07140532226703!3d-17.391359921760525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e3710885814767%3A0x5b5b305840444b22!2sRestaurante%20%22Don%20Oscar%22!5e1!3m2!1ses!2sbo!4v1602624751956!5m2!1ses!2sbo"
            width="600"
            height="450"
            frameborder="0"
            style="border:0;"
            allowfullscreen=""
            aria-hidden="false"
            tabindex="0"
          ></iframe>
        </div>
      </div>
    </section>
    </div>
</div>
<a class="btn btn-warning" href="indexx.php?modulo=carrito" role="button">regresar al carrito</a>
<button type="submit" class="btn btn-primary float-right" name="guardar" value="guardar">ir a pagar</button>
</form>
<?php
}
else{
    ?>
    <div class="mt-5 text-center">
        debe <a href="login.php">loguerase</a> o <a href="login.php"> registrarse </a>
    </div>
    <?php
}
