<?php
include 'bd.php';

// Conectar a la base de datos
	$bd=crear_base();
    
// Obtener los datos del formulario
$titulo = $_POST['titulo'];
$mensaje = $_POST['mensaje'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($titulo)&&isset($mensaje)) {
        
   
  

//query para encontrar el id para pasarlo a la columna 'autor' de tickets
$sqlId = "SELECT id FROM empleados WHERE email='".$_SESSION['email']."'";
$resul = $bd->query($sqlID);
foreach($resul as $fila){
    $id=$fila['id'];
}

// Insertar el ticket en la base de datos
$sql = "INSERT INTO tickets (título, mensaje, autor) VALUES ('$titulo', '$mensaje','$id')";

if ($bd->query($sql) === TRUE) {
    echo "Ticket creado exitosamente.";
} else {
    echo "Error de ticket";
}
$bd->exec($sql);
// Cerrar la conexión
}
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Ticket</title>
</head>
<body>
    <h2>Crear Nuevo Ticket</h2>
    <form method="POST">
        Titulo:<br>
        <input type="text" name="titulo" required><br><br>

        Mensaje:<br>
        <textarea name="mensaje" rows="4" required></textarea><br><br>

        <input type="submit" value='Enviar Ticket'>
    </form>
</body>
</html>
