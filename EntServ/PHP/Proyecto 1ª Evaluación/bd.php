<?php
function comprobar_usuario($nombre, $clave){
	// Incluyo los parámetros de conexión y creo el objeto PDO
	include "configuracion_bd.php";
	$bd = new PDO("mysql:dbname=".$bd_config["nombrebd"].";host=".$bd_config["ip"], 
					$bd_config["usuario"],
					$bd_config["clave"]);

	// Creo la sentencia SQL y ejecuto	
	$query = "SELECT contraseña, email FROM empleados WHERE email = '$nombre' 
			AND contraseña = '$clave'";
	$resul = $bd->query($query);	
	if($resul->rowCount() === 1){		
		return $resul->fetch();		
	}else{
		return FALSE;
	}
}