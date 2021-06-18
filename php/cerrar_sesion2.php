<?php
session_start();
session_destroy();
header("location: ../login.php?mensaje=sesion cerrada exitosamente");
?>