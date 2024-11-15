<?php
require_once 'sesiones.php';
cerrar_sesion();
header("Location: login.php");
exit();
?>
