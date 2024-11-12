<?php
require_once 'bd.php';
require_once 'sesiones.php';

if (!isset($_GET['id'])) {
    header("Location: principalTécnico.php");
}

$bd=crear_base();
$query="SELECT id FROM empleados WHERE id= (SELECT autor FROM tickets WHERE num = {$_GET['id']});";
$idautor= $bd->query($query);


if ($_SESSION['tipo'] != 0 || $_SESSION['usuario']['id'] != $idautor) {
    header("Location: login.php?denegado=ticketajeno");
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