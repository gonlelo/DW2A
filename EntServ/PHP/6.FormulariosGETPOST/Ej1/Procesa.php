<html>
    <head>

    </head>
    <body>
        
    <h1>Procesa formulario</h1>
<?php
    if (isset($_GET[num1]) && isset($_GET[num2])){
        if (is_numeric(num1) && is_numeric(num2)) {
            $suma=$_GET["num1"]+$_GET["num2"];
            echo "La suma de " . $_GET["num1"]. " y " . $_GET["num2"] . " es " . $suma;
        }else {
            echo "Los parámetros deben ser números";
        }

    }else {
        echo "Me faltan datos";
    }
    ?>
    </body>
</html>