<?php 
// Comprueba que el usuario haya abierto sesión o redirige
require_once 'sesiones.php';
comprobar_sesion();

// Lectura del código recibido
$cod = $_POST['cod'];
$unidades = (int)$_POST['unidades'];

// Si existe el código sumamos las unidades
if(isset($_SESSION['carrito'][$cod])){
	$_SESSION['carrito'][$cod] += $unidades;
}else{
	$_SESSION['carrito'][$cod] = $unidades;		
}
header("Location: carrito.php");
