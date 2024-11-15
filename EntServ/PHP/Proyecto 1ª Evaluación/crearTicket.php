<?php 
require_once 'sesiones.php';
require_once 'bd.php';

//Comprobar que la sesión esté iniciada y que el usuario sea un empleado.
comprobar_sesion();
if ($_SESSION['tipo'] != 0) {
    
 header("Location: login.php?denegado=empleado");
   
}else{
$bd=crear_base();
    $query = "SELECT COUNT(num) as total_tickets FROM tickets WHERE autor ={$_SESSION['usuario']['id']} AND estado!='Cerrado'";
    $resul = $bd->query($query);
    foreach($resul as $fila){
        if ($fila['total_tickets']>=3) {
            //no puede añadir un ticket
            header("Location: principalEmpleado.php");
        }else{
            //se añade el ticket
            
        }
    }
}
?>



<!----------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Ticket</title>
</head>
<body>
    <h2>Crear Nuevo Ticket</h2>
    <form action="principalEmpleado.php" method="POST" enctype="multipart/form-data">
        Titulo:<br>
        <input type="text" name="titulo" required><br><br>

        Mensaje:<br>
        <textarea name="mensaje" rows="4" required></textarea><br><br>
        <input type="file" name="archivo" id="archivo"><br><br>
        <input type="submit" value='Enviar Ticket'>
    </form>
</body>
</html>