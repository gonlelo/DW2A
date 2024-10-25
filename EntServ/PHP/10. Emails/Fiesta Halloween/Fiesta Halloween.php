<html>
    <head>

    </head>
    <body>
        <?php
        require "../vendor/autoload.php";
        require '../emails.php';

                $cadena_conexión ="mysql:dbname=empresa;host=127.0.0.1";
                $usuario ="root";
                $clave ="";
                $bd = new PDO($cadena_conexión, $usuario, $clave);
                $resultado = $bd->query("SELECT Nombre FROM usuarios");
        ?>
        <form method="post">
                <?php
                foreach ($resultado as $usu) {
                    echo $usu['Nombre'] . '<input type="checkbox" name=' . $usu['Nombre'] . '><br>';
                }
                ?>
            <input type="submit" value="Invitar" />
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $resultado = $bd->query("SELECT Nombre FROM usuarios");
                foreach ($resultado as $usu) {
                    if (isset($_POST[$usu['Nombre']])){
                    enviarEmail($usu['Nombre'] . "@empresa.com", "tuamigo@gmail.com", "TE INVITO A MI FIESTA DE HALLOWEEN", "Es mañana trae chocolate");
                    }
                
            } }?>
        </form>
    </body>
</html>