<?php 
// Comprueba que el usuario haya abierto sesión o redirige
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();


if (tipo_de_usuario($_SESSION['usuario']=='empresa.com')) {
    ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Página Principal</title>
	</head>
	<body>
		<h1>Lista de tickets, hola usuario</h1>		
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
<?php
}else{
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset = "UTF-8">
            <title>Página Principal</title>
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
    <?php
}
?>