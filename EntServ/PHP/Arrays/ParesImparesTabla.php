<html>
<head></head>
<body>
<?php
    $contadorpares=0;
    $sumapares=0;
    $contadorimpares=0;
    $productoimpares=1;
    $num=1;

    while ($contadorpares<20 && $contadorimpares<20) {
        if ($num%2==0){
            $sumapares+=$num;
            $contadorpares++;
        }else {
            $productoimpares*=$num;
            $contadorimpares++;
        }
        $num++;
    }

    echo $sumapares.$productoimpares



?>

</body>
</html>
