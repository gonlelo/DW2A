<?php
function cerrar_sesion(){
		session_start();
		session_destroy();
	}

function comprobar_sesion(){
	session_start();
	if(!isset($_SESSION['usuario'])){	
		header("Location: login.php?redirigido=true");
	}else {
		return false;
	}
}

function datos_sesion($email){
	$bd=crear_base();
	$query = "SELECT * FROM empleados WHERE email = '{$email}'";
	$resul = $bd->query($query);
	return $resul->fetch();
}
?>