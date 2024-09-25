<html>
<head>
    <style>
table, th, td {
  border: 1px solid black;
}
</style>    
</head>
<body>
<?php
    $contadorpares=0;
    $sumapares=0;
    $contadorimpares=0;
    $productoimpares=1;
    $num=0;

    while ($contadorpares<20 || $contadorimpares<20) {
        if ($num%2==0){
            if ($contadorpares<=20){
                $sumapares+=$num;
                $contadorpares++;
            }
        }elseif ($contadorimpares<=20) {
            $productoimpares*=$num;
            $contadorimpares++;
        }
        $num++;
    }
?>

<table>
    <tr><th>Suma de pares</th><td><?php echo $sumapares ?></td></tr>
    <tr><th>Producto de impares</th><td><?php echo $productoimpares ?></td></tr>

</body>
</html>
