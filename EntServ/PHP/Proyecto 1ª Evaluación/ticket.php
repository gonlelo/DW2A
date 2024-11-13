<?php
require_once 'bd.php';
require_once 'sesiones.php';

if (!isset($_GET['idticket'])) {
    header("Location: principalTécnico.php");
}

$bd=crear_base();
$query="SELECT id FROM empleados WHERE id= (SELECT autor FROM tickets WHERE num = {$_GET['idticket']});";
$resul = $bd->query($query);
foreach ($resul as $fila) {
    $idautor = $fila['id'];
}

if ($_SESSION['tipo'] != 1 && $_SESSION['usuario']['id'] != $idautor){
    header("Location: login.php?denegado=ticketajeno");
}else {
    echo "holaaa";
}
?>


<!----------------------------------------------------------------------------------------->


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ticket</title>
</head>
<body>
    
</body>
</html>