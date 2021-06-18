<?php
include '../php/conexion_be.php';
$con=$conexion;
if(isset($_REQUEST['idBorrar'])){
  $id=mysqli_real_escape_string($con,$_REQUEST['idBorrar']??'');
  $query="DELETE from usuarios where id='".$id."';";
  $res=mysqli_query($con,$query);
  if($res)
  {
    ?>
    <div class="alert alert-warning float-right" role="alert">
    cliente eliminado (no puede hacer pedidos)
    </div>
    <?php
    }else{
    ?>
    <div class="alert alert-danger float-right" role="alert">
    error al borrar <?php echo mysqli_error($con); ?>
    </div>
    <?php
  }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>usuarios</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Opciones
                    <a href="panel.php?modulo=crearUsuario"> mas <i class="fa fa-plus" aria-hidden="true"></i></a>
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      $query=" SELECT id,nombre_completo,correo FROM usuarios ";
                      $res=mysqli_query($con, $query);
                      while($row=mysqli_fetch_assoc($res)){
                      ?>
                  <tr>
                    <td><?php echo $row['nombre_completo'] ?></td>
                    <td><?php echo $row['correo'] ?></td>
                    <td>
                        <a href="panel.php?modulo=editarUsuario&id=<?php echo $row['id'] ?>" style="margin-right: 5px;"> <i class="fas fa-edit"></i></a>
                        <a href="panel.php?modulo=usuarios&idBorrar=<?php echo $row['id'] ?>" class="text-danger borrar"> <i class="fas fa-trash"></i></a>
                    </td>
                  </tr> 
                  <?php
                      }
                  ?>               
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>