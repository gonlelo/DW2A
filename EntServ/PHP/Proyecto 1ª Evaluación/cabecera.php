<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <meta charset="UTF-8">
    <style>
        /* Estilos para la cabecera */
        .cabecera {
            background-color: #007BFF; /* Color de fondo de la cabecera */
            padding: 10px;
            margin: 0px 0px 15px 0px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
            font-family: Arial, sans-serif;
        }
        .cabecera .titulo {
            font-size: 1.5em;
            font-weight: bold;
        }
        .cabecera .acciones {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .cabecera .acciones img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        .cabecera .acciones button {
            background-color: #FF5722;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .cabecera .acciones button:hover {
            background-color: #E64A19;
        }
    </style>
</head>
<body>
    <div class="cabecera">
        <div class="titulo">Registro de Usuario</div>
        <div class="acciones">
            <img src="perfil.png" alt="Perfil"> <!-- Asegúrate de tener una imagen de perfil llamada perfil.png -->
            <form action="logout.php" method="POST" style="margin: 0;">
        <button type="submit">Cerrar Sesión</button>
    </form>
        </div>
    </div>
</body>
</html>
