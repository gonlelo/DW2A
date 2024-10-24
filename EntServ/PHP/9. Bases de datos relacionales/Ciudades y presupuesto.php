<html>
    <body>
    <?php
    if ($_SERVER['REQUEST_METHOD']== "GET") { ?>
    <h1>hola</h1>
        <form method="post">
            Ciudad:<input type="text" name="Ciudad">
            <input type="submit" value="Buscar" />
        </form>
    <?php } else {
        $suma_presupuestos = 0;
        echo "<h1>Mostrando presupuesto de  " . $_POST["Ciudad"] . "</h1>";

        $cadena_conexión ="mysql:dbname=empresa;host=127.0.0.1";
        $usuario ="root";
        $clave ="";
        $bd = new PDO($cadena_conexión, $usuario, $clave);

        $resultado = $bd->query("SELECT presupuesto FROM departamentos WHERE ciudad= '" . $_POST["Ciudad"] . "'");
        foreach ($resultado as $fila) {
        $suma_presupuestos += $fila["presupuesto"];
        }
            
        if (!isset($fila)) {
            echo "La ciudad " . $_POST["Ciudad"] . " no existe";
        } else {
            echo $suma_presupuestos;
        }
    }
    ?>
    </body>
</html>