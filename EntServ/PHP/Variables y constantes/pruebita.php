<html>                                      <!--El código html no es leído por el intérprete PHP, que solo busca el código entre <?php  ?> -->
    <head></head>
    <body>

<?php

    $boaster = "maloooo";
    echo "Hola PUTÓN $boaster" ;  

    define("NUM_CLIENTES",48);

    for($i = 0; $i < NUM_CLIENTES; $i++){
        echo "Hay $i clientes " . "<br>";
        
    }

?>
</body>
</html>