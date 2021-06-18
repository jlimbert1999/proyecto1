<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>login y registro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/estilos.css" />
  <script src="main.js"></script>
</head>
<body>
 
  <main>
    <div class="contenedor__todo">
      <div class="caja__trasera">
        <div class="caja__trasera-login">
            <h3>¿ya tienes una cuenta?</h3>
            <p>inicia sesion para entrar</p>
            <button id="btn__iniciar-sesion">INICIAR SESION</button>
        </div>
        <div class="caja__trasera-register">
           <h3>¿aun no tienes una cuenta?</h3>
           <p>registrate para que puedas iniciar sesion</p>
           <button id="btn__registrarse"> registrarse </button>
        </div>
      </div>
      <div class="contenedor__login-register">
        <form action="php/login_usuario_be2.php" method="POST" class="formulario__login">
          <h2>iniciar sesion</h2>
          <input type="text" placeholder="Correo Electronico" name="correo">
          <input type="password" placeholder="Contraseñar" name="contrasena">
          <button>entrar</button>
        </form>

        <!--registroooo-->
        <form action="php/registro_usuario_be2.php" method="POST" class="formulario__register">
          <h2>Registrarse</h2>
          <input type="text" placeholder="Nombre Completo" name="nombre_completo">
          <input type="text" placeholder="Coreo Electronico" name="correo">
          <input type="password" placeholder="Contraseña" name="contrasena">
          <button>registrarse</button>
        </form>
      </div>
    </div>
  </main>
  <script src="assets/js/script.js"></script>
</body>
</html>