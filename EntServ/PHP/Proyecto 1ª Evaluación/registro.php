<?php
require_once 'bd.php';
require_once 'sesiones.php';
require 'vendor/autoload.php';
require 'emails.php';

cerrar_sesion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $clave = $_POST['clave'];
    $clave2 = $_POST['clave2'];
    if($clave !== $clave2){
        $err = 1;
    }else{
      $bd=crear_base();
      $query = "SELECT email FROM empleados WHERE email = '{$_POST['email']}'";
      $resul = $bd->query($query);
      if ($resul->rowcount() === 1) {
        $err = 2;
      }else{
            $subcadena='';
            $letra = '@';

            $hash = md5($clave);
        
        // 1. Encontrar la posición de la letra en el string.
        $posicion = strpos($_POST['email'], $letra);
        
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // 2. Extraer la parte del string que sigue a la letra.
            $subcadena = substr($_POST['email'], $posicion + 1);
        
        if ($subcadena !='empresa.com' && $subcadena != 'soporte.empresa.com') {
            $err = 3;
        }else {
            $cod = crear_cod_verificacion();
            $query ="INSERT INTO `empleados` (`nombre`, `apellido`, `email`, `contraseña`, cod_verificacion) VALUES ('{$_POST['nombre']}', '{$_POST['apellido']}', '{$_POST['email']}', '{$hash}','{$cod}' )";
            $bd->query($query);
            $err = enviarEmail($_POST['email'], $_POST['nombre'], 'tuempresa@empresa.com', 'Verifica tu identidad', "Copia el siguiente link en tu navegador: <br> <br> localhost{$_SERVER['PHP_SELF']}?cod={$cod}");
        }
        }else {
            $err = 4;
        }
      }
    }
}
if (isset($_GET['cod'])) {
    $bd=crear_base();
    $query = "SELECT id FROM empleados WHERE cod_verificacion = '{$_GET['cod']}'";
    $resul = $bd->query($query);
    foreach ($resul as $fila) {
        $id = $fila['id'];
    }

    $query = "UPDATE empleados SET verificado = 1 WHERE id = {$id};";
    $bd->query($query);
    header("Location: login.php?redirigido=verificado");
}
?>
<!----------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html>
	<head>
		<title>Registro</title>
		<meta charset = "UTF-8">
    </head>
    <body>
    <form action = "registro.php" method = "POST">
			<label for = "email">Email</label> 
			<input value = "<?php if(isset($_POST['email'])) echo $_POST['email'];?>" id = "email" name = "email" type = "text" required>
            <label for = "nombre">Nombre</label> 
			<input value = "<?php if(isset($_POST['nombre'])) echo $_POST['nombre'];?>" id = "nombre" name = "nombre" type = "text" required>
            <label for = "apellido">Apellido</label> 
			<input value = "<?php if(isset($_POST['nombre'])) echo $_POST['apellido'];?>" id = "apellido" name = "apellido" type = "text" required>
			<label for = "clave">Clave</label>
			<input id = "clave" name = "clave" type = "password" required>
            <label for = "clave2">Confirmar clave</label>
			<input id = "clave2" name = "clave2" type = "password" required>
			<input type = "submit">
		</form>
        <?php
		if (isset($err)) {
			switch ($err) {
				case 1:
					echo "<b><p style='color: red'>Las contraseñas no coinciden</p></b>";
					break;
				case 2:
					echo "<b><p style='color: red'>Este correo ya tiene una cuenta asociada</p></b>";
					break;
				case 3:
					echo '<b><p style="color: red">El correo de empresa debe acabar en "@empresa.com" o "@soporte.empresa.com"</p></b>';
					break;
				case 4:
					echo '<b><p style="color: red">Formato de email inválido. <br>
                    Formato válido: "nombreapellido@empresa.com" o "nombreapellido@soporte.empresa.com"</p></b>';
					break;
                case 5:
                    echo "<b><p style='color: green'>Verifica tu identidad con el email que hemos enviado a {$_POST['email']}<br>";
					break;
			}
		} 
		?>
    </body>
</html>
