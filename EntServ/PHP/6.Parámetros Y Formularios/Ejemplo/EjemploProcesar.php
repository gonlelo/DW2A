<html>
    <head>

    </head>
    <body>
        
    <h1>Procesa formulario</h1>
<?php
    echo $_SERVER["REQUEST_METHOD"];
    echo "Usuario: " . $_POST["usu"]. "<br>";
    echo "Clave: " . $_POST["pas"] . "<br>";
    echo "¿Acepta?" . $_POST["acepto"];
?>
    </body>
</html>