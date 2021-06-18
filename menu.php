
<!-- Navbar -->
<nav class="navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="indexx.php" class="nav-link">vuelve!!</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" action="indexx.php">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar bg-gray" type="search" placeholder="Search" aria-label="Search" name="nombre" value="<?php echo $_REQUEST['nombre']??''; ?>">
        <input type="hidden" name="modulo" value="platos">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" id="iconoCarrito">
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
          <span class="badge badge-danger navbar-badge" id="badgeProducto"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listaCarrito">
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" >
          <i class="fa fa-user" aria-hidden="true"></i>
                  </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
        <?php
        if(isset($_SESSION['idCliente'])==false){
        ?>
        <a href="login.php" class="dropdown-item text-primary">
            <i class="fas fa-door-open mr-2"></i> loguearse
            </a>
          <div class="dropdown-divider"></div>
          <a href="login.php" class="dropdown-item text-purple">
          <i class="fas fa-sign-in-alt mr-2"></i> registrarse
          </a>
          <div class="dropdown-divider"></div>
          <a href="index.html" class="dropdown-item text-purple">
          <i class="fas fa-sign-in-alt mr-2"></i> regresar
          </a>
          <?php
        }else{
          ?>
           <a href="" class="dropdown-item text-purple">
          <i class="fas fa-user text-primary"></i> <?php echo $_SESSION['nombreCliente']?>
        </a>
          <a href="php/cerrar_sesion2.php" class="dropdown-item text-purple">
          <i class="fas fa-sign-in-alt mr-2"></i> cerrar sesion
        </a>
          <?php   
        }
          ?>
        </div>
      </li>
    </ul>
  </nav>
