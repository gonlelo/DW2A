<?php 
// Comprueba que el usuario haya abierto sesión o redirige
require_once 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Carrito de la compra</title>		
        <style>
            form{
				margin-right: 1em;
                float: left;
            }
			td, th{
				text-align:center;
				padding-right:2em;
			}
        </style>
	</head>
	<body>
		
		<?php 
		require 'cabecera.php';			
		$productos = cargar_productos(array_keys($_SESSION['carrito']));
		if($productos === FALSE){
			echo "<p>No hay productos en el pedido</p>";
			exit;
		}
		echo "<h2>Carrito de la compra</h2>";
		echo "<table>"; //abrir la tabla
		echo "<tr><th>Nombre</th><th>Descripción</th><th>Peso</th><th>Unidades</th></tr>";
		foreach($productos as $producto){
			$cod = $producto['CodProd'];
			$nom = $producto['Nombre'];
			$des = $producto['Descripcion'];
			$peso = $producto['Peso'];
			$unidades = $_SESSION['carrito'][$cod];								
			
			//print_r($producto);				
			echo "<tr><td>$nom</td><td>$des</td><td>$peso</td><td>$unidades</td>
			<input name = 'cod' type='hidden' value = '$cod'>  </form></td></tr>";	
		}
		echo "</table>";						
		?>
		<hr>
		<h1>¿Desea confirmar el pedido?</h1>
        <form action="procesar_pedido.php">
    <input type="submit" value="CONFIRMAR" />
        </form>
        <form action="carrito.php">
    <input type="submit" value="CANCELAR" />
        </form>
	</body>
</html>
