<?php
include 'bd.php';
require_once 'sesiones.php';

// Comprobar que la sesión esté iniciada y que el usuario sea un empleado
comprobar_sesion();
if ($_SESSION['tipo'] != 0) {
    header("Location: login.php?denegado=empleado");
}

// Conectar a la base de datos
$bd = crear_base();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $titulo = $_POST['titulo'];
    $mensaje = $_POST['mensaje'];
    $email = $_SESSION['email']; // Obtener el email del usuario de la sesión
    
    if (isset($titulo) && isset($mensaje)) {
        // Insertar el ticket en la base de datos usando el email en lugar del id
        $query = "INSERT INTO tickets (título, mensaje, autor) VALUES ('$titulo', '$mensaje', '$email')";

        if ($bd->exec($query) === 1) {
            echo "<h2><b><p style='color: green'>Ticket creado exitosamente.</p></b></h2>";
        } else {
            echo "<p style='color: red'>Error creando ticket</p>";
        }

        // Cerrar la conexión
        $bd = null;
    }
} 
?>

    
    
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset = "UTF-8">
            <title>Vista empleado</title>
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
            <h1>Hola empleado</h1>
            <a href="crearTicket.php">Crear ticket</a>
            <br><br>
            <h1>Tus tickets</h1>
<?php 
// Conectar nuevamente a la base de datos para obtener los tickets del usuario
$bd = crear_base();
$email = $_SESSION['email']; // Obtener el email del usuario de la sesión

// Consultar todos los tickets cuyo autor sea el email de la persona loggeada
$query = "SELECT num, título, mensaje, estado FROM tickets WHERE autor = '$email'";
$resul = $bd->query($query);

if ($resul && $resul->rowCount() >= 1) {
    foreach ($resul as $ticket) {
        echo "<div>";
        echo "<h1><b>#{$ticket['num']}</b> {$ticket['título']}</h1>";
        echo "<p>{$ticket['mensaje']}</p><br>";
        echo "<p><b>{$ticket['estado']}</b></p>";
        echo "</div>";
    }
} else {
    echo "<p>No tienes tickets creados. Aquí se mostrarán los tickets que crees.</p>";
}

// Cerrar la conexión
$bd = null;
?>

    </body>
</html>
