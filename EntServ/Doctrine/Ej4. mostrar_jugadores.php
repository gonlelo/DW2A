<?php
require_once "bootstrap.php";
require_once './src/Equipo.php';

if (isset($_POST['nombre'])) {
    $repetido = $entityManager->getRepository('Equipo')->findOneBy(['nombre' => $_POST['nombre']]);
    if ($repetido) {
        $entityManager->remove($repetido);
        $entityManager->flush();    
        echo "<p style='color:green'> Equipo eliminado </p>";
    }else {
        echo "Equipo '" . $_POST['nombre'] . "' no encontrado";
    }

}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Creación de Equipo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, select, button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">Mostrar jugadores de un equipo</h1>
    <form method="POST">
        <label for="eq">Nombre del Equipo:</label>
      <select name="nombre" id="eq">
        <?php 
        $equipos = $entityManager->getRepository('Equipo')->findAll();
        foreach ($equipos as $equipo) {
        $nombre = $equipo->getNombre();
        echo "<option value='$nombre'>$nombre</option>";
        }
        ?>
      </select>
        <button type="submit">Eliminar Equipo</button>
    </form>
</body>
</html>
