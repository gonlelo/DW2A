<?php 
include 'bd.php';
require_once 'sesiones.php';
//Comprobar que la sesión esté iniciada y que el usuario sea un técnico.
comprobar_sesion();
if ($_SESSION['tipo'] != 1) {
    header("Location: login.php?denegado=técnico");
}
?>

<!----------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Vista Técnico</title>
		<style>
                div{
                    padding: 0.5em;
                    border: 4px solid #CC99CC;
                    border-radius: 2em;
                    margin-bottom: 1em;
                    width: 60%;
                }
        </style>
	</head>
	<body>
		<a href="login.php" style="float: right">Cerrar Sesión </a>
		<h1>Lista de tickets, hola moderador</h1>		
		<?php
			$bd=crear_base();
			
			//Sacar todos los tickets
			$query = "SELECT tck.num, tck.título, tck.mensaje, tck.estado, emp.nombre, emp.apellido FROM tickets tck LEFT JOIN empleados emp WHERE autor = {$id}";
			$resul = $bd->query($query);
			if($resul->rowCount() >= 1){
				foreach ($resul as $ticket) {
					echo "<div>";
					echo "<h1><b>#{$ticket['tck.num']}</b> {$ticket['tck.título']}</h1>";
					echo "<p>{$ticket['tck.mensaje']}</p><br>";
					echo "<p><b>{$ticket['tck.estado']}</b></p>";
					echo "<p><b>{$ticket['tck.estado']}</b></p>";
					echo "<p style='float: right'>Autor: {$ticket['emp.nombre']} {$ticket['emp.apellido']}</p>";
					echo "</div>";
				}
			}else {
				echo "<p>Nadie ha creado ningún ticket. Disfruta de tu descanso</p>";
			}

			// Cerrar la conexión
			$bd = null;
		?>
	</body>
</html>
$query = "SELECT tck.num, tck.título, tck.mensaje, tck.estado, emp.nombre, emp.apellido FROM tickets tck LEFT JOIN empleados emp WHERE autor = {$id}";
echo "<p><b>{$ticket['tck.estado']}</b></p>";
echo "<p style='float: right'>Autor: {$ticket['emp.nombre']} {$ticket['emp.apellido']}</p>";