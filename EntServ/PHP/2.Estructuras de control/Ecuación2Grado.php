<html>
<head></head>
<body>
<?php 
    $a=1;
    $b=-14;
    $c=49;
    $solución1=0;
    $solución2=0;
    $discriminante=0;

    $discriminante = $b**2 - 4*$a*$c; 

    if ($discriminante>0){
        $solución1 = (-$b + sqrt($b**2 - 4*$a*$c))/(2*$a);
        $solución2 = (-$b - sqrt($b**2 - 4*$a*$c))/(2*$a);
        echo "La ecuación tiene 2 soluciones reales distintas:  $solución1   y     $solución2";

    }
    elseif ($discriminante==0) {
        $solución1 = (-$b + sqrt($b**2 - 4*$a*$c))/(2*$a);
        echo "La ecuación tiene una solución real repetida:   $solución1";
    }
    else {
        echo "No existen soluciones reales";
    }

?>

</body>

</html>