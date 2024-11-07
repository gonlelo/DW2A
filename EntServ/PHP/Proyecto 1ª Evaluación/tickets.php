<?php
require_once 'bd.php';
// Configuración de la base de datos
$servername = "localhost";
$username = "usuario";
$password = "clave";
$dbname = "tickets";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$subject = $_POST['subject'];
$description = $_POST['description'];

// Insertar el ticket en la base de datos
$sql = "INSERT INTO tickets (subject, description) VALUES ('$subject', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "Ticket creado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Ticket</title>
</head>
<body>
    <h2>Crear Nuevo Ticket</h2>
    <form action="guardar_ticket.php" method="POST">
        <label for="subject">Asunto:</label><br>
        <input type="text" id="subject" name="subject" required><br><br>

        <label for="description">Descripción:</label><br>
        <textarea id="description" name="description" rows="4" required></textarea><br><br>

        <button type="submit">Enviar Ticket</button>
    </form>
</body>
</html>
