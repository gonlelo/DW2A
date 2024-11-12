<?php
function crear_base(){
	// Incluyo los parámetros de conexión y creo el objeto PDO
	include "configuracion_bd.php";
	$bd = new PDO("mysql:dbname=".$bd_config["nombrebd"].";host=".$bd_config["ip"], 
					$bd_config["usuario"],
					$bd_config["clave"]);

	return $bd;
}
function comprobar_usuario($nombre, $clave){
	$comprobar = array(
		"Usuario" => false,
		"Contraseña" => false,
	);
	// Incluyo los parámetros de conexión y creo el objeto PDO
	include "configuracion_bd.php";
	$bd = new PDO("mysql:dbname=".$bd_config["nombrebd"].";host=".$bd_config["ip"], 
					$bd_config["usuario"],
					$bd_config["clave"]);

	// Creo la sentencia SQL y ejecuto	
	$query = "SELECT email FROM empleados WHERE email = '$nombre'";
	$resul = $bd->query($query);
	if($resul->rowCount() === 1){
		$comprobar['Usuario'] = true;
		$query = "SELECT contraseña, email FROM empleados WHERE email = '$nombre' AND contraseña = '$clave'";
		$resul = $bd->query($query);
		if($resul->rowCount() === 1){
			return $resul->fetch();
		}else {
			return $comprobar;
		}
	}else{
		return $comprobar;
	}
}

function tipo_de_usuario($email){
	$subcadena='';
	$letra = '@';
	
	// 1. Encontrar la posición de la letra en el string.
	$posicion = strpos($email, $letra);
	
	if ($posicion !== false) {
		// 2. Extraer la parte del string que sigue a la letra.
		$subcadena = substr($email, $posicion + 1);
		
}
	if ($subcadena=='empresa.com') {
		$_SESSION['tipo'] = 0;
		return 0;
	}else if ($subcadena=='soporte.empresa.com') {
		$_SESSION['tipo'] = 1;
		return 1;
	}
}

function borrarTicket($id){
	$bd=crear_base();
	$query = "DELETE FROM tickets WHERE num = $id";
			$resul = $bd->query($query);
	$bd = null;
}