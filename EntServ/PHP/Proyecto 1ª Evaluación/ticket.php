<?php
require_once 'bd.php';
require_once 'sesiones.php';
comprobar_sesion();
if (!isset($_GET['idticket'])) {
    header("Location: principalTécnico.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST")  {
	if (isset($_POST['eliminar'])) {
		borrarTicket($_POST['eliminar']);
        header("Location: principalTécnico.php");
	}else if (isset($_POST['estado'])) {
	    cambiarEstado($_POST['estado'],$_POST['idTicket']);
	}
}
$bd=crear_base();
$query="SELECT id FROM empleados WHERE id= (SELECT autor FROM tickets WHERE num = {$_GET['idticket']});";
$resul = $bd->query($query);
foreach ($resul as $fila) {
    $idautor = $fila['id'];
}


?>


<!----------------------------------------------------------------------------------------->


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ticket</title>
</head>
<body>
    <?php
    if ($_SESSION['tipo'] == 0 && $_SESSION['usuario']['id'] != $idautor){
    header("Location: login.php?denegado=ticketajeno");
}else {
    if ($_SESSION['tipo'] == 0 ){
        $query = "SELECT tck.num, tck.título, tck.mensaje, tck.estado, emp.nombre, emp.apellido, DATE_FORMAT(tck.fecha, '%Y-%m-%d %H:%i') as fecha FROM tickets tck LEFT JOIN empleados emp ON tck.autor = emp.id WHERE tck.num = {$_GET['idticket']}";
                $resul = $bd->query($query);
                if($resul->rowCount() >= 1){
                    foreach ($resul as $ticket) {
                        echo "<div style='float: left; clear: left; width: 100%;'>";
                        echo "<i><p style='float: right'>De: {$ticket['nombre']} {$ticket['apellido']}</p></i>";
                        echo "<h1><b>#{$ticket['num']}</b> {$ticket['título']}</h1><br>";
                        echo "<p style='float: right'><small>Fecha: {$ticket['fecha']}</small></p>";
                        echo "<p>{$ticket['mensaje']}</p><br>";
                        echo "<h3>CONVERSACIÓN</h3><br>";
                        crearURL($ticket['num']);
                        if ($_SERVER["REQUEST_METHOD"] == "POST")  {
                            if (isset($_POST['respuesta'])) {
                                crearRespuesta($_POST['respuesta'],$_SESSION['usuario']['id'],$ticket['num']);
                                
                                header("Location: ticket.php?idticket={$ticket['num']}");
                            }   
                            }
                            mostrarRespuestas($ticket['num']); 
                            echo "<br><form method='POST' style='display:inline;'> 
                        <textarea name='respuesta' placeholder='Respuesta'></textarea>
                         <input type='hidden' name='respuestaActiva' value='True'>
                        <button type='submit' style='text-align: left;'>Responder</button>
                        </form><br><br>"; 
                        echo "<p><b>{$ticket['estado']}</b></p>";
                        echo "<form method='POST' style='display:inline;'> 
                        <input type='hidden' name='eliminar' value='{$ticket['num']}'>
                        <br><br><button type='submit' style='text-align: left; color:white; background-color: red;'>Borrar</button>
                        </form>";
                       
                       
                        echo "</div>";
                    }
                }
    }else{
        $query = "SELECT tck.num, tck.título, tck.autor, tck.mensaje, tck.estado, emp.nombre, emp.apellido, DATE_FORMAT(tck.fecha, '%Y-%m-%d %H:%i') as fecha FROM tickets tck LEFT JOIN empleados emp ON tck.autor = emp.id WHERE tck.num = {$_GET['idticket']}";
                $resul = $bd->query($query);
                if($resul->rowCount() >= 1){
                    foreach ($resul as $ticket) {
                        echo "<div style='float: left; clear: left; width: 100%;'>";
                        echo "<i><p style='float: right'>De: {$ticket['nombre']} {$ticket['apellido']}</p></i>";
                        echo "<h1><b>#{$ticket['num']}</b> {$ticket['título']}</h1><br>";
                        echo "<p style='float: right'><small>Fecha: {$ticket['fecha']}</small></p>";
                        echo "<p>{$ticket['mensaje']}</p><br>";
                        echo "<h3>CONVERSACIÓN</h3><br>";
                        crearURL($ticket['num']);
                        if ($_SERVER["REQUEST_METHOD"] == "POST")  {
                        if (isset($_POST['respuesta'])) {
                            crearRespuesta($_POST['respuesta'],$_SESSION['usuario']['id'],$ticket['num']);
                            header("Location: ticket.php?idticket={$ticket['num']}");
                        }   
                        }
                        mostrarRespuestas($ticket['num']);
                        echo "<br><form method='POST' style='display:inline;'> 
                        <textarea name='respuesta' placeholder='Respuesta'></textarea>
                         <input type='hidden' name='respuestaActiva' value='True'>
                        <button type='submit' style='text-align: left;'>Responder</button>
                        </form><br><br>"; 
                        echo "<form method='POST' style='display:inline;'> 
                        Estado: <select id='estado' name='estado'>
                            <option value='creado' ". ($ticket['estado'] == 'creado' ? 'selected' : '') .">Creado</option>
                            <option value='solucionado' ". ($ticket['estado'] == 'solucionado' ? 'selected' : '') ." >Solucionado</option>
                            <option value='en proceso' ". ($ticket['estado'] == 'en proceso' ? 'selected' : '') ." >En proceso</option>
                            <option value='cerrado' ". ($ticket['estado'] == 'cerrado' ? 'selected' : '') ." >Cerrado</option>
                        </select>
                        <input type='hidden' name='idTicket' value='{$ticket['num']}'>
                        <button type='submit' style='text-align: left'>Cambiar</button>
                        </form>";
                        echo "<form method='POST' style='display:inline;'> 
                        <input type='hidden' name='eliminar' value='{$ticket['num']}'>
                        <br><br><button type='submit' style='text-align: left; color:white; background-color: red;'>Borrar</button>
                        </form>";
                       
                       
                        echo "</div>";
                    }
                }
    }
}
?>
</body>
</html>