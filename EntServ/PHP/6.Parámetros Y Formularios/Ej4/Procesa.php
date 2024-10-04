<html>
    <head>

    </head>
    <body>
        
    <h1>Procesa formulario</h1>
<?php
    if (isset($_POST["Temperatura"]) && strlen($_POST["Temperatura"]) > 0){
        if (is_numeric($_POST["Temperatura"])) {
            if ($_POST["Temperatura"] >= -273.15 && $_POST["Temperatura"] <= 10000) {
                if ($_POST["Unidad"] == "C") {
                    $resultado = $_POST["Temperatura"] + 273.15;
                    echo $_POST["Temperatura"] . $_POST["Unidad"] . " equivale a " . $resultado . "F";
                } else {
                    $resultado = $_POST["Temperatura"] - 273.15;
                    echo $_POST["Temperatura"] . $_POST["Unidad"] . " equivale a " . $resultado . "C";
                }
                
                
            }else {
                echo "Temperatura fuera de rango";
            }
            
        }else {
            echo "La temperatura debe ser un número";
        }

    }else {
        echo "Me faltan datos";
    }
    ?>
    </body>
</html>