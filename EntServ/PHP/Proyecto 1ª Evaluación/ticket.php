<?php
require_once 'bd.php';
require_once 'sesiones.php';
require 'vendor/autoload.php';
require 'emails.php';

comprobar_sesion();
if (!isset($_GET['idticket'])) {
    header("Location: principalTécnico.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST")  {
	if (isset($_POST['eliminar'])) {
		borrarTicket($_POST['eliminar']);
        if (tipo_de_usuario($_SESSION['email'])==1) {
            header("Location: principalTécnico.php");
        }else{
            header("Location: principalEmpleado.php");
        }  
        header("Location: principalTécnico.php");
	}else if (isset($_POST['estado'])) {
        $bd=crear_base();
        $query = "SELECT tck.num, tck.título, tck.mensaje, tck.estado, emp.nombre, emp.email, DATE_FORMAT(tck.fecha, '%Y-%m-%d %H:%i') as fecha FROM tickets tck LEFT JOIN empleados emp ON tck.autor = emp.id WHERE tck.num = {$_GET['idticket']}";
        $resul = $bd->query($query);
        foreach ($resul as $fila) {
            $email = $fila['email'];
            $nombre = $fila['nombre'];
            $titulo = $fila['título'];
            $estado = $fila['estado'];
        }
	    cambiarEstado($_POST['estado'],$_POST['idTicket']);
        enviarEmail($email, $nombre, 'tuempresa@empresa.com', 'El estado de tu ticket ha cambiado', "Tu ticket <b>$titulo</b> ha sido marcado por un tecnico como <b>{$_POST['estado']}</b>");
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
                            <option value='Creado' ". ($ticket['estado'] == 'Creado' ? 'selected' : '') .">Creado</option>
                            <option value='Solucionado' ". ($ticket['estado'] == 'Solucionado' ? 'selected' : '') ." >Solucionado</option>
                            <option value='En proceso' ". ($ticket['estado'] == 'En proceso' ? 'selected' : '') ." >En proceso</option>
                            <option value='Cerrado' ". ($ticket['estado'] == 'Cerrado' ? 'selected' : '') ." >Cerrado</option>
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