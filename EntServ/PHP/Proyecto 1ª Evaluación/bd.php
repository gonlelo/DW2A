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
	$bd = crear_base();

	// Creo la sentencia SQL y ejecuto	
	$query = "SELECT email FROM empleados WHERE email = '$nombre'";
	$resul = $bd->query($query);
	if($resul->rowCount() === 1){
		$comprobar['Usuario'] = true;
		$query = "SELECT email, contraseña FROM empleados WHERE email ='$nombre'";
		$resul = $bd->query($query);
		foreach ($resul as $fila) {
			if(md5($clave)===$fila['contraseña']){
				return $resul->fetch();
			}else {
				return $comprobar;
			}
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
			$bd->query($query);
	$bd = null;
}

function cambiarEstado($estado,$id){
	$bd=crear_base();
	$query = "UPDATE tickets SET estado='$estado'WHERE num = '$id'";
			$bd->query($query);
	$bd = null;
}

function buscarTicket($palabra){
	$bd=crear_base();
	$query ="SELECT tck.num, tck.título, tck.mensaje, tck.estado, emp.nombre, emp.apellido, DATE_FORMAT(tck.fecha, '%Y-%m-%d %H:%i') as fecha FROM tickets tck LEFT JOIN empleados emp ON 
	tck.autor = emp.id WHERE tck.título LIKE '%$palabra%' OR emp.nombre LIKE '%$palabra%' OR  tck.mensaje LIKE '%$palabra%' OR  emp.apellido LIKE '%$palabra%' OR  tck.num LIKE '%$palabra%' ORDER BY fecha DESC";
			
			$resul = $bd->query($query);
			foreach ($resul as $ticket) {

						echo "<a href='ticket.php?idticket={$ticket['num']}' style='text-decoration: none;'>";
						echo "<div style='float: left; clear: left'>";
						echo "<h1><b>#{$ticket['num']}</b> {$ticket['título']}</h1>";
						echo "<p>{$ticket['mensaje']}</p><br>";
						echo "<p><b>{$ticket['estado']}</b></p>";
						echo "<form method='POST' style='display:inline;'> 
						<input type='hidden' name='eliminar' value='{$ticket['num']}'>
						<button type='submit' style='text-align: left'>Borrar</button>
						</form>";
						echo "<p><small>Fecha: {$ticket['fecha']}</small></p>";
						echo "<i><p style='text-align: right'>De: {$ticket['nombre']} {$ticket['apellido']}</p></i>";
						echo "</div>";
						echo "</a>";
					}
				
		
	$bd = null;
}

function crearRespuesta($respuesta,$autor,$num){
	$bd = crear_base();
	$query = "INSERT INTO respuestas (mensaje, autor, ticket) VALUES ('$respuesta', '$autor', '$num')";
	$bd->query($query);
}

function mostrarRespuestas($ticket){
	$bd = crear_base();
	$query = "SELECT res.mensaje, emp.nombre, emp.apellido, DATE_FORMAT(res.fecha, '%Y-%m-%d %H:%i:%s') as fecha FROM respuestas res LEFT JOIN empleados emp ON res.autor = emp.id WHERE res.ticket=$ticket ORDER BY fecha DESC";
	$resul = $bd->query($query);
	foreach($resul as $fila){
		echo "<p><b>{$fila['nombre']} {$fila['apellido']}</b>: {$fila['mensaje']} <span style='padding-left:15em;'>{$fila['fecha']}</span></p> ";
	}
}

function crearURL($idTicket){
	$bd = crear_base();
	$query = "SELECT ruta FROM tickets WHERE num='$idTicket'";
	$resul = $bd->query($query);
	if($resul->rowCount() >= 1){
		$qry="SELECT ruta FROM tickets WHERE num ='$idTicket'";
		$resul = $bd->query($qry);
		foreach($resul as $fila){
			echo "<a href='descarga.php?ruta=" . urlencode($fila['ruta']) . "'>Descargar archivo</a>";
		}
		
	}
}

function crear_cod_verificacion() {
	$num1=rand(0,9);
	$num2=rand(0,9);
	$num3=rand(0,9);
	$num4=rand(0,9);
	$num5=rand(0,9);
	$num6=rand(0,9);
	$num7=rand(0,9);
	$num8=rand(0,9);
	$numString="$num1$num2$num3$num4$num5$num6$num7$num8";
	return $numString;
}