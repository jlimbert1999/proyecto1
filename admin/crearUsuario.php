<?php
    if(isset($_REQUEST['guardar']) ){
        include "../php/conexion_be.php";
        $con=$conexion;
        $email= mysqli_real_escape_string($con, $_REQUEST['email']??'');
        $pass= hash('sha512',mysqli_real_escape_string($con, $_REQUEST['pass']??''));
        $nombre= mysqli_real_escape_string($con, $_REQUEST['nombre']??'');
        $query="INSERT INTO usuarios
        (correo                 ,contrasena             ,nombre_completo) VALUES
        ('".$email."','".$pass."','".$nombre."'); 
        ";
        $res=mysqli_query($con, $query);
        if($res){
            echo '<meta http-equiv="refresh" content="0; url=../admin/panel.php?modulo=usuarios&mensaje=USUARIO CREADO EXITOSAMENTE" />';
        }
        else{
?>
            <div class="alert alert-danger" role="alert">
                error al crear usuarios <?php echo mysqli_error($con); ?>
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
            <h1> Crear usuarios</h1>
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
              <form action="panel.php?modulo=crearUsuario" method="post">
              <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control">
              </div>
              <div class="form-group">
              <label>pass</label>
              <input type="password" name="pass" class="form-control">
              </div>
              <div class="form-group">
              <label>Nombre</label>
              <input type="text" name="nombre" class="form-control">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="guardar"> Guardar</button>
              </div>
              </form>
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