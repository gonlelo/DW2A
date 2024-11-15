<?php
include 'bd.php';
require_once 'sesiones.php';
require 'vendor/autoload.php';
require_once 'emails.php';

// Comprobar que la sesión esté iniciada y que el usuario sea un empleado.
comprobar_sesion();
if ($_SESSION['tipo'] != 0) {
    header("Location: login.php?denegado=empleado");
    exit;
}

// Conectar a la base de datos
$bd = crear_base();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $titulo = $_POST['titulo'];
    $mensaje = $_POST['mensaje'];
    if (isset($titulo) && isset($mensaje)) {
            
        // Query para encontrar el id para pasarlo a la columna 'autor' de tickets
        $sqlId = "SELECT id FROM empleados WHERE email='". $_SESSION['email'] ."'";
        $resul = $bd->query($sqlId);
        foreach($resul as $fila){
            $id = $fila['id'];
        }
            $nombreArchivo = $_FILES['archivo']['name'];
            $temporalArchivo = $_FILES['archivo']['tmp_name'];
            
            $directorioDestino = rtrim(dirname(__FILE__), '/')."/archivos/";
            
    
            if (!is_dir($directorioDestino)) {
                mkdir($directorioDestino, 0777, true);
            }
    
            $nombreUnico = basename($nombreArchivo);
            $rutaArchivo = $directorioDestino . $nombreUnico;
    
            move_uploaded_file($temporalArchivo, $rutaArchivo);

        // Insertar el ticket en la base de datos
        $query = "INSERT INTO tickets (título, mensaje, autor, ruta) VALUES ('$titulo', '$mensaje','$id','$rutaArchivo')";

        if ($bd->exec($query) === 1) {

            enviarEmail($_SESSION['usuario']['email'], $_SESSION['usuario']['nombre'], 'tuempresa@empresa.com', '¡Ticket creado!', "Tu ticket ha sido creado. Un tecnico lo revisara lo antes posible.<br><br><br>
            <b>{$_POST['titulo']}</b><br><br>
            {$_POST['mensaje']}");
            // Redirigir al usuario para evitar el reenvío de formulario
            header("Location: principalEmpleado.php?ticket_creado=1");
            exit;
        } else {
            echo "Error creando ticket";
        }

        // Cerrar la conexión
        $bd = null;
    }
}
if (isset($_GET['ticket_creado'])) {
    echo "<p style='color:green'>Ticket creado</p>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vista empleado</title>
    <style>
        div {
            padding: 0.5em;
            border: 4px solid #CC99CC;
            border-radius: 2em;
            margin-bottom: 1em;
            width: 60%;
        }
    </style>
</head>
<body>
    <h1>Hola Empleado</h1>
    <a href="login.php" style="float: right">Cerrar Sesión </a>
    <a href="crearTicket.php">Crear ticket</a>
    <br><br>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="principalEmpleado.php">
        <input type="text" name="busqueda" placeholder="Buscar tickets..." value="<?php echo isset($_GET['busqueda']) ? $_GET['busqueda'] : ''; ?>">
        <button type="submit">Buscar</button>
    </form>

    <h1>Tus tickets</h1>

    <?php 
    // Conectar a la base de datos
    $bd = crear_base();

    // Obtener el ID del usuario logueado para mostrar solo sus tickets
    $sqlId = "SELECT id FROM empleados WHERE email='". $_SESSION['email'] ."'";
    $resul = $bd->query($sqlId);
    foreach($resul as $fila){
        $id = $fila['id'];
    }

    // Consulta de tickets del usuario, con búsqueda opcional
    $query = "SELECT ruta, num, título, mensaje, estado, DATE_FORMAT(fecha, '%Y-%m-%d %H:%i') as fecha FROM tickets WHERE autor = :id";

    // Si hay un término de búsqueda, lo añadimos a la consulta
    if (isset($_GET['busqueda']) && !empty($_GET['busqueda'])) {
        $busqueda = '%' . $_GET['busqueda'] . '%';
        $query .= " AND (título LIKE :busqueda OR mensaje LIKE :busqueda)";
    }

    $query .= " ORDER BY fecha DESC";

    $stmt = $bd->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if (isset($busqueda)) {
        $stmt->bindParam(':busqueda', $busqueda, PDO::PARAM_STR);
    }

    $stmt->execute();

    // Mostrar los tickets del usuario
    if ($stmt->rowCount() >= 1) {
        foreach ($stmt as $ticket) {
            echo "<a href='ticket.php?idticket={$ticket['num']}' style='text-decoration: none;'>";
            echo "<div>";
            echo "<h1><b>#{$ticket['num']}</b> {$ticket['título']}</h1>";
            // $db = crear_base();
	        // $query1 = "SELECT ruta FROM tickets WHERE num={$ticket['num']} AND (ruta LIKE '%.jpg' OR ruta LIKE '%.png' OR ruta LIKE '%.peg' OR ruta LIKE '%.gif')";
            // $resul1 = $db->query($query1);
            // if($resul1->rowCount() >= 1){
            // foreach($resul1 as $fila){
		    //Si el archivo es .png o .jpg se muestra la imagen
            // if ($fila['ruta']) {
            var_dump($ticket['ruta']) ;
            $ticket['ruta'] = str_replace('\\', '/', $ticket['ruta']);
            echo "<img src='".htmlspecialchars($ticket['ruta'], ENT_QUOTES, 'UTF-8')."' width='100px' style='float:right;'>";
            // }
        
        // }
		
	// }
            
            
            echo "<p>{$ticket['mensaje']}</p><br>";
            echo "<p><b>{$ticket['estado']}</b></p>";
            echo "<p><small>Fecha: {$ticket['fecha']}</small></p>";
            echo "</div>";
            echo "</a>";
        }
    } else {
        echo "<p>No se encontraron tickets para tu búsqueda.</p>";
    }

    // Cerrar la conexión
    $bd = null;
    ?>
</body>
</html>