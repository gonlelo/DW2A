<?php 
require_once 'sesiones.php';

//Comprobar que la sesión esté iniciada y que el usuario sea un empleado.
comprobar_sesion();
if ($_SESSION['tipo'] != 0) {
    header("Location: login.php?denegado=empleado");
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