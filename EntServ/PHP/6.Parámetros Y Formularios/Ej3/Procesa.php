<html>
    <head>

    </head>
    <body>
        
    <h1>Procesa formulario</h1>
<?php
    if (isset($_POST["peso"],$_POST["altura"]) && strlen($_POST["peso"]) > 0 && strlen($_POST["altura"]) > 0){
        if (is_numeric($_POST["peso"]) && is_numeric($_POST["altura"])) {
            if ($_POST["peso"] > 0 && $_POST["altura"] > 0) {
                $IMC=$_POST["peso"]/($_POST["altura"]**2);
                echo "Tu IMC es " . $IMC;
            }else {
                echo "Los números deben ser positivos";
            }
            
        }else {
            echo "Los parámetros deben ser números";
        }

    }else {
        echo "Me faltan datos";
    }
    ?>
    </body>
</html>