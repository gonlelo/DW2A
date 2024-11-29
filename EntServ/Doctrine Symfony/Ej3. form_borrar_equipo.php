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
    <h1 style="text-align: center">Eliminar un  Equipo</h1>
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
