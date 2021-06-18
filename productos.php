<div class="row mt-1">
      <?php
      include_once "php/conexion_be.php";
      $conexion = mysqli_connect("localhost", "root", "", "restaurante1");
        $where="where 1=1";
        $nombre=mysqli_real_escape_string($conexion,$_REQUEST['nombre']??'');
         if(empty($nombre)==false){
           $where="and nombre like '%".$nombre."%'";
         }
         $queryCuenta="SELECT COUNT(*) AS cuenta FROM platos $where ;";
         $resCuenta=mysqli_query($conexion,$queryCuenta);
         $rowCuenta=mysqli_fetch_assoc($resCuenta);
         $totalRegistros=$rowCuenta['cuenta'];
         $elementosPorPagina=6;
         $totalPaginas=ceil($totalRegistros/$elementosPorPagina);
         $paginaSel=$_REQUEST['pagina']??false;
         if($paginaSel==false){
           $inicioLimite=0;
           $paginaSel=1;
         }
         else{
           $inicioLimite=($paginaSel-1)*$elementosPorPagina;
         }
          $limite=" limit $inicioLimite,$elementosPorPagina";
         $query=" SELECT
                p.id,
                p.nombre,
                p.precio,
                p.existencia,
                f.web_path
                FROM
                platos AS p
                INNER JOIN productos_files AS pf ON pf.producto_id=p.id
                INNER JOIN files AS f ON f.id=pf.file_id
                $where
                GROUP BY p.id
                $limite
                ";
                $res=mysqli_query($conexion,$query);
                while($row=mysqli_fetch_assoc($res)){
                  ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="card border-primary">
                  <img class="card-img-top img-thumbnail" src="<?php echo $row['web_path']?>" alt="">
                  <div class="card-body">
                  <h4 class="card-title"><?php echo $row['nombre']?></h4>
                  <p class="card-text"><strong> Precio: </strong> <?php echo $row['precio']?></p>
                  <p class="card-text"><strong>existencia: </strong><?php echo $row['existencia']?></p>
                  <a href="indexx.php?modulo=detalleproducto&id=<?php echo $row['id'] ?>" class="btn btn-primary">ver</a>  
                </div>
                  </div>
                </div>
                <?php
                }
      ?>
    </div>
                <?php
                if($totalPaginas>0){
                  ?>
                  <nav aria-label="Page navigation">
                    <ul class="pagination">
                    <?php
                    if( $paginaSel!=1){
                    ?>
                    <li class="page-item disabled">
                      <a class="page-link" href="indexx.php?modulo=platos&pagina=<?php echo ($paginaSel-1);?>" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                      </a>
                      </li>
                    <?php
                    }
                    ?>
                    
                    <?php
                    for($i=1;$i<=$totalPaginas;$i++){
                      ?>
                      <li class="page-item <?php echo ($paginaSel==$i)?" active ":" ";?>">
                        <a class="page-link" href="indexx.php?modulo=platos&pagina=<?php echo $i;?> <?php echo $i;?>" aria-label="Previous">
                      </a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if($paginaSel!=$totalPaginas){
                      ?>
                      <li class="page-item">
                      <a class="page-link" href="indexx.php?modulo=platos&pagina=<?php echo ($paginaSel+1);?>">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                      </a>
                      </li>
                      <?php
                    }
                      ?>
                      </ul>
                      </nav>
                  <?php
                }
                  ?>