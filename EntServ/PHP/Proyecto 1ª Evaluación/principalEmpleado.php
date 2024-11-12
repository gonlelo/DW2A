<?php
include 'bd.php';
require_once 'sesiones.php';

//Comprobar que la sesión esté iniciada y que el usuario sea un empleado.
comprobar_sesion();
if ($_SESSION['tipo'] != 0) {
    header("Location: login.php?denegado=empleado");
}
// Conectar a la base de datos
$bd=crear_base();
    

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $titulo = $_POST['titulo'];
    $mensaje = $_POST['mensaje'];
    if (isset($titulo) && isset($mensaje)) {
            
        //query para encontrar el id para pasarlo a la columna 'autor' de tickets
        $sqlId = "SELECT id FROM empleados WHERE email='". $_SESSION['email'] ."'";
        $resul = $bd->query($sqlId);
        foreach($resul as $fila){
            $id=$fila['id'];
        }

        // Insertar el ticket en la base de datos
        $query = "INSERT INTO tickets (título, mensaje, autor) VALUES ('$titulo', '$mensaje','$id')";

        if ($bd->exec($query) === 1) {
            echo "<h2><b><p style='color: green'>Ticket creado exitosamente.</p></b></h2>";
        } else {
            //NO SE SI ESTO SE ACTIVA EN ALGUN MOMENTO HABRIA QUE TESTEARLO
            echo "Error creando ticket";
        }

        // Cerrar la conexión
        $bd = null;
    }
} ?>

    
    
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
            <h1>Hola empleado</h1>
            <a href="login.php" style="float: right">Cerrar Sesión </a>
            <a href="crearTicket.php">Crear ticket</a>
            <br><br>
            <h1>Tus tickets</h1>
<?php 
$bd=crear_base();
//Sacar la id de la persona loggeada para mostrar solo sus tickets
$sqlId = "SELECT id FROM empleados WHERE email='". $_SESSION['email'] ."'";
$resul = $bd->query($sqlId);
foreach($resul as $fila){
    $id=$fila['id'];
}

//Sacar todos los tickets cuyo autor sea la persona loggeada
$query = "SELECT num, título, mensaje, estado FROM tickets WHERE autor = {$id}";
$resul = $bd->query($query);
if($resul->rowCount() >= 1){
    foreach ($resul as $ticket) {
        echo "<div>";
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