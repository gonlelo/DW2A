<?php
require_once "bootstrap.php";
require_once './src/Equipo.php';

if (isset($_POST['nombre'])) {
    $repetido = $entityManager->getRepository('Equipo')->findOneBy(array('nombre' => $_POST['nombre']));
    if ($repetido) {
        echo "<p style='color:red'>MEEEEC ERRORRRR REPETIDOOO   </p>";
        $err = true;
    }
    if ($_POST['fundacion'] > 2024 || $_POST['fundacion'] < 0) {
        echo "<p style='color:red'>MEEEEC ERRORRRR AÑO MALOOO PON OTRO ANDAA</p>";
        $err = true;
    }
    if ($_POST['socios'] < 0 || is_nan($_POST['socios'])) {
        echo "<p style='color:red'>MEEEEC ERRORRRR SOCIOSSS TEINE QUE SER POSITIVO Y NUMEOR IMBECIL</p>";
        $err = true;
    }
    if (is_numeric($_POST['ciudad'])) {
        echo "<p style='color:red'>NO PUUEDAE SER NUMERO S LA CIUDAD ERRRORORRORRRRROOOOOOORRR</p>";
        $err = true;
    }
    if (!isset($err)) {
        $nuevo = new Equipo();
        $nuevo->setNombre($_POST['nombre']);
        $nuevo->setFundacion($_POST['fundacion']);
        $nuevo->setSocios($_POST['socios']);
        $nuevo->setCiudad($_POST['ciudad']);
        $entityManager->persist($nuevo);
        $entityManager->flush();
        echo "<p style='color:green'> Equipo insertado </p>";
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
    <h1 style="text-align: center">Crear un Nuevo Equipo</h1>
    <form method="POST">
        <label for="nombre">Nombre del Equipo:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="fundacion">Año de Fundación:</label>
        <input type="number" id="fundacion" name="fundacion"  max="2024" required>
        
        <label for="socios">Cantidad de Socios:</label>
        <input type="number" id="socios" name="socios" min="0" required>
        
        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" required>
        
        <button type="submit">Crear Equipo</button>
    </form>
</body>
</html>
