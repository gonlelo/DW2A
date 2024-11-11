<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Ticket</title>
</head>
<body>
    <h2>Crear Nuevo Ticket</h2>
    <form action="principalUsuario.php" method="POST">
        Titulo:<br>
        <input type="text" name="titulo" required><br><br>

        Mensaje:<br>
        <textarea name="mensaje" rows="4"></textarea><br><br>

        <input type="submit" value='Enviar Ticket'>
    </form>
</body>
</html>
