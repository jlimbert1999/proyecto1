<?php
include_once "php/conexion_be.php";
$id= mysqli_real_escape_string($conexion,$_REQUEST['id']??'');
$queryProducto="SELECT id,nombre,precio,existencia FROM platos where id='$id'; ";
$resProducto=mysqli_query($conexion,$queryProducto);
$rowProducto=mysqli_fetch_assoc($resProducto);

?>
<!-- Default box -->
<div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?php echo $rowProducto['nombre'] ?></h3>
              <?php
              $queryImagenes="SELECT
              f.web_path
              FROM
              platos AS p
              INNER JOIN productos_files AS pf ON pf.producto_id=p.id
              INNER JOIN files AS f ON f.id=pf.file_id
              WHERE p.id='$id';
              ";
              $resPrimerImagen=mysqli_query($conexion,$queryImagenes); 
              $rowPrimerImagen=mysqli_fetch_assoc($resPrimerImagen);
              ?>
              <div class="col-12">
                <img src="<?php echo $rowPrimerImagen['web_path'] ?>" class="product-image">
              </div>
              <div class="col-12 product-image-thumbs">
              <?php
              $resImagenes=mysqli_query($conexion,$queryImagenes); 
              while($rowImagenes=mysqli_fetch_assoc($resImagenes)){
              ?>
                <div class="product-image-thumb"><img src="<?php echo $rowImagenes['web_path'] ?>" ></div>
               
              <?php
              }
              ?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo $rowProducto['nombre'] ?></h3>
              <p></p>

              <hr>
              <h4>existencias: <?php echo $rowProducto['existencia'] ?></h4>

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                <?php echo  $rowProducto['precio'] ?> Bs.
                </h2>
              </div>
              <div class="mt-4">
                <button class="btn btn-primary btn-lg btn-flat" id="agregarCarrito"
                data-id="<?php echo $_REQUEST['id'] ?>"
                data-nombre="<?php echo $rowProducto['nombre'] ?>"
                data-web_path="<?php echo $rowPrimerImagen['web_path'] ?>"
                data-precio="<?php echo $rowProducto['precio'] ?>"

                >
                  <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                  agregar a pedido
                </button>
              </div>
              <div class="mt-4">
              cantidad
              <input type="number" name="form-control" id="cantidadProducto" value="1">
              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">  </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
         </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->