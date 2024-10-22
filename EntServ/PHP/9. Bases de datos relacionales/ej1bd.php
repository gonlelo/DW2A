 <html>
    <head></head>
    <body>
 <?php
    // 1. Comprobar si el usuario me envia el ?usuario
    if(!isset($_GET["usuario"])) {
        echo "No me lo has pasado";
    } else {
        // 2. Comprobaciones de seguridad por si acaso no es un nº (que habría que hacer)
        echo "<h1>Mostrando info del usuario ".$_GET["usuario"] ." </h1><br>";

        // 3. Conectarme a la BD
        $cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
        $usuario = 'root';
        $clave = '';
        $bd = new PDO($cadena_conexion, $usuario, $clave);

        // 4. Hacer una query
        $query = "SELECT * FROM usuarios WHERE codigo=".$_GET["usuario"];
        $resultado = $bd->query($query);

        // 5. Recuperarme las filas
        foreach($resultado as $fila) {
            echo $fila['Codigo'] ." " . $fila['Nombre']." " . $fila['Rol']." " . $fila['Clave'];
        }
    }
?>
</body>
</html>