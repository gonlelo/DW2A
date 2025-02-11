<?php
require_once 'bd.php';
require_once 'sesiones.php';
require 'cabecera.php';

//Al llegar a esta página se borra la sesión. Así un link a esta página se puede usar como cierre de sesión.
cerrar_sesion();

/* Formulario de login habitual
si va bien abre sesión, guarda el nombre de usuario y redirige a principal.php 
si va mal, mensaje de error */
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
	
	$usu = comprobar_usuario($_POST['usuario'], $_POST['clave']);
	
	if(isset($usu['Usuario']) && $usu['Usuario'] == false){
		$err = 1;
	}elseif (isset($usu["Contraseña"])){
		$err = 2;
	}else{
		session_start();
		$_SESSION['email'] = $_POST['usuario'];
		//Aquí se incluyen todos los datos del usuario actual
		$_SESSION['usuario'] = datos_sesion($_POST['usuario']);

		if ($_SESSION['usuario']['verificado'] == 1) {
			if (tipo_de_usuario($_SESSION['email'])==1) {
				header("Location: principalTécnico.php");
			}else{
				header("Location: principalEmpleado.php");
			}
		}else {
			$err = 8;
		}

	}
}else {
	if (isset($_GET['denegado'])) {
		if ($_GET['denegado'] == 'empleado') {
			$err = 3;
		}
		if ($_GET['denegado'] == 'técnico') {
			$err = 4;
		}
		if ($_GET['denegado'] == 'ticketajeno') {
			$err = 6;
		}
		if ($_GET['denegado'] == 'perfilajeno') {
			$err = 9;
		}
	}
	if(isset($_GET["redirigido"])){
		if ($_GET['redirigido'] == true) {
			$err = 5;
		}
		if ($_GET['redirigido'] == 'verificado') {
			$err = 7;
		}
	}
} ?>

<!----------------------------------------------------------------------------------------->


<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de login</title>
		<meta charset = "UTF-8">
		<style>
		body{
			margin: 2em;
		}
		form{
			margin-bottom: 1em;
		}
		</style>
	</head>
	<body>
		<form action = "login.php" method = "POST">
			<label for = "usuario">Usuario</label> 
			<input value = "<?php if(isset($_POST['usuario'])) echo $_POST['usuario'];?>" id = "usuario" name = "usuario" type = "text" required>
			<label for = "clave">Clave</label> 
			<input id = "clave" name = "clave" type = "password" required>					
			<input type = "submit">
		</form>
		<a href="registro.php">O regístrate aquí<a>
		<?php
		if (isset($err)) {
			switch ($err) {
				case 1:
					echo "<b><p style='color: red'>Usuario no existe</p></b>";
					break;
				case 2:
					echo "<b><p style='color: red'>Contraseña incorrecta</p></b>";
					break;
				case 3:
					echo "<b><p style='color: red'>ACCESO DENEGADO. Para acceder inicia sesión con una cuenta de empleado.</p></b>";
					break;
				case 4:
					echo "<b><p style='color: red'>ACCESO DENEGADO. Para acceder inicia sesión con una cuenta de técnico.</p></b>";
					break;
				case 5:
					echo "<b><p style='color: gray'>Inicie sesión para continuar</p></b>";
					break;
				case 6:
					echo "<b><p style='color: red'>ACCESO DENEGADO. El ticket que estás intentando acceder no es tuyo. </p></b>";
					break;
				case 7:
					echo "<b><p style='color: green'>Cuenta verificada. Inicia sesión para continuar. </p></b>";
					break;
				case 8:
					echo "<b><p style='color: red'>Cuenta no verificada. Verificala mediante el link enviado a tu correo electrónico AÑADIR 'MANDAR DE NUEVO'. </p></b>";
					break;
				case 8:
					echo "<b><p style='color: red'></p>ACCESO DENEGADO. El perfil que estás intentando acceder no es tuyo. </b>";
					break;
			}
		} 

		?>
	</body>
</html>