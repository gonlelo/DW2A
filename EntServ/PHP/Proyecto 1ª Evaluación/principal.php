<?php 
// Comprueba que el usuario haya abierto sesión o redirige
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();


if (tipo_de_usuario($_SESSION['email'])==1) {
    header("Location: principalModerador.php");
}else{
    header("Location: principalUsuario.php");
}
?>