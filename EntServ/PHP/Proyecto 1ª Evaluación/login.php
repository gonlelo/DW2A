<?php
require_once 'bd.php';
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
		// $usu tiene campos correo y codRes, correo
		// ??? preguntar a ivicho
		$_SESSION['usuario'] = $usu;
		$_SESSION['email'] = $_POST['usuario'];


		header("Location: principal.php");
		return;
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
		<?php if(isset($_GET["redirigido"])){
			echo "<p>Inicie sesión para continuar</p>";
		}?>

		<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
			<label for = "usuario">Usuario</label> 
			<input value = "<?php if(isset($_POST['usuario'])) echo $_POST['usuario'];?>" id = "usuario" name = "usuario" type = "text" required>
			<label for = "clave">Clave</label> 
			<input id = "clave" name = "clave" type = "password" required>					
			<input type = "submit">
		</form>

		<?php
		if (isset($err)) {
			switch ($err) {
				case 1:
					echo "<b><p style='color: red'>Usuario no existe</p></b>";
					break;
				case 2:
					echo "<b><p style='color: red'>Contraseña incorrecta</p></b>";
					break;
			}
		} 

		?>
	</body>
</html>