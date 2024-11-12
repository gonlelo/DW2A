<?php 
include 'bd.php'; // Include the database configuration file
require_once 'sesiones.php'; // Include session functions

// Ensure the session is started and that the user is a technician
comprobar_sesion();
if ($_SESSION['tipo'] != 1) {
    header("Location: login.php?denegado=técnico");
    exit();
}

// Establish the database connection
$bd = crear_base(); // Assuming bd.php provides a function named crear_base()

?>

<!DOCTYPE html>
    <html>
        <head>
            <meta charset = "UTF-8">
            <title>Vista tecnico</title>
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
            <h1>Todos tickets</h1>
<?php 
//Sacar todos los tickets cuyo autor sea la persona loggeada
$query = "SELECT num, título, mensaje, estado, autor FROM tickets";
$resul = $bd->query($query);
if($resul->rowCount() >= 1){
    foreach ($resul as $ticket) {
        echo "<div>";
		echo "<p><i>De: {$ticket['autor']}</i></p>";
        echo "<h1><b>#{$ticket['num']}</b> {$ticket['título']}</h1>";
        echo "<p>{$ticket['mensaje']}</p><br>";
        echo "<p><b>{$ticket['estado']}</b></p>";
        echo "</div>";
    }
}else {
    echo "<p>No tienes tickets creados. Aquí se mostrarán los tickets que crees.</p>";
}

// Cerrar la conexión
$bd = null;
?>

        </body>
    </html>