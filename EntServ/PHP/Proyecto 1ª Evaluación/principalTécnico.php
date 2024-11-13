<?php 
include 'bd.php';
require_once 'sesiones.php';
//Comprobar que la sesión esté iniciada y que el usuario sea un técnico.
comprobar_sesion();
if ($_SESSION['tipo'] != 1) {
    header("Location: login.php?denegado=técnico");
}
if ($_SERVER["REQUEST_METHOD"] == "POST")  {
	if (isset($_POST['eliminar'])) {
		borrarTicket($_POST['eliminar']);
	}
	if (isset($_POST['palabra'])) {
		buscarTicket($_POST['palabra']);
	}
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
		<h1 style='float: left; clear: left;'>Hola Técnico</h1>		
		<h1 style='float: left; clear: left;'>Lista de tickets</h1>
		<?php
			$bd=crear_base();
			
			echo "<form method='POST' style='display:inline; float: right; padding-right=1em '> 
					<input type='text' name='palabra'>
					<input type='submit' value='Buscar'></input>
					</form>";
			//Sacar todos los tickets
			$query = "SELECT tck.num, tck.título, tck.mensaje, tck.estado, emp.nombre, emp.apellido FROM tickets tck LEFT JOIN empleados emp ON tck.autor = emp.id;";
			$resul = $bd->query($query);
			if($resul->rowCount() >= 1){
				foreach ($resul as $ticket) {
					echo "<a href='ticket.php?idticket={$ticket['num']}' style='text-decoration: none;'>";
					echo "<div style='float: left; clear: left;'>";
					echo "<h1><b>#{$ticket['num']}</b> {$ticket['título']}</h1>";
					echo "<p>{$ticket['mensaje']}</p><br>";
					echo "<p><b>{$ticket['estado']}</b></p>";
					echo "<form method='POST' style='display:inline;'> 
					<input type='hidden' name='eliminar' value='{$ticket['num']}'>
					<button type='submit' style='text-align: left'>Borrar</button>
					</form>";
					echo "<i><p style='text-align: right'>De: {$ticket['nombre']} {$ticket['apellido']}</p></i>";
					echo "</div>";
					echo "</a>";
				}
			}else {
				echo "<p>No hay tickets disponibles. Disfruta de tu descanso</p>";
			}
			// Cerrar la conexión
			$bd = null;
		?>
	</body>
</html>