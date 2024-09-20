<html>
    <head></head>
    <body>
    <?php 
        $mes=9;

        if ($mes>=1 && $mes<=3){
            echo "Es primavera";
        }
        elseif ($mes>=4 && $mes<=6) {
            echo "Es Verano";
        }
        elseif($mes>=7 && $mes<=9){
            echo "Es Otoño";
        }
        elseif ($mes>=10 && $mes<=12) {
            echo "Es invierno";
        }
        else {
            echo "Mes no válido";
        };

    ?>

    </body>

</html>