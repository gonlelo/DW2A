<?php
require_once 'bd.php';
require_once 'sesiones.php';

comprobar_sesion();
if (!isset($_GET['id'])){
    if (isset($_SESSION['usuario'])) {
        header ("Location: perfil.php?id={$_SESSION['usuario']['id']}");
    }else {
        header ("Location: perfil.php?id={$_SESSION['usuario']['id']}");
    }

}
// if ($_GET['id'] != $_SESSION['usuario']['id']) {
//     header ("Location: login.php?denegado=perfilajeno");
// }
?>

<!----------------------------------------------------------------------------------------->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="perfil.php" method="POST" enctype="multipart/form-data">
    <?php 
        // Imagen del perfil
        echo "<img  alt='Foto de perfil'><br><br>"; 
    ?>
    
    Nombre:<br>
    <?php 
        echo "<input type='text' name='nombre'  required><br><br>"; 
    ?>
    
    Apellido:<br>
    <?php 
        echo "<input type='text' name='apellido'  required><br><br>"; 
    ?>
    
    Teléfono:<br>
    <?php 
        echo "<input type='text' name='telefono'  required><br><br>"; 
    ?>
    
    País de Nacimiento:<br>
    <?php 
        echo "<input type='text' name='pais_nacimiento'  required><br><br>"; 
    ?>
    
    <!-- Botón para enviar el formulario -->
    <input type="submit" value="Actualizar Perfil">
    value='{$_SESSION['usuario']['nombre']}'
    value='{$_SESSION['usuario']['teléfono']}'
    value='{$_SESSION['usuario']['pais_nacimiento']}'
    src='localhost{$_SESSION['usuario']['ruta_pfp']}'
</form>
</body>
</html>