<?php 
include 'bd.php';
require_once 'sesiones.php';
//Comprobar que la sesión esté iniciada y que el usuario sea un técnico.
comprobar_sesion();
if ($_SESSION['tipo'] != 1) {
    header("Location: login.php?denegado=técnico");
}
?>

<!----------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Vista Técnico</title>
	</head>
	<body>
		<h1>Lista de tickets, hola moderador</h1>		
		<!--lista de vínculos con la forma 
		productos.php?categoria=1-->
		<?php
		// $categorias = cargar_categorias();
		// if($categorias===false){
		// 	echo "<p class='error'>Error al conectar con la base datos</p>";
		// }else{
		// 	echo "<ul>"; //abrir la lista
		// 	foreach($categorias as $cat){				
		// 		/*$cat['nombre] $cat['codCat']*/
		// 		$url = "productos.php?categoria=".$cat['codCat'];
		// 		echo "<li><a href='$url'>".$cat['nombre']."</a></li>";
		// 	}
		// 	echo "</ul>";
		// }
		?>
	</body>
</html>