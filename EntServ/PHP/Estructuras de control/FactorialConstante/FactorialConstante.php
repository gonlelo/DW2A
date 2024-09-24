<html>
<head></head>
<body>
<?php 
require "Constante.php";

 $factorial=1;
 if (NUMERO>=0 && NUMERO-(int)NUMERO==0){
    for($i = NUMERO; $i>1 ;$i--){
        $factorial=$factorial*$i;
    }
    echo "El factorial de ".NUMERO." es $factorial";
 }
 elseif (NUMERO>=0) {
    echo "El número no es entero";
 }
 elseif (NUMERO-(int)   NUMERO==0) {
    echo "El número no es positivo";
 }
 else {
    echo "El número no es ni positivo ni entero";
 };

?>

</body>
</html>