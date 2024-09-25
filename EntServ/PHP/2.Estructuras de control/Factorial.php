<html>
<head></head>
<body>
<?php 
 $num=10;
 $factorial=1;
 if ($num>=0 && $num-(int)$num==0){
    for($i = $num; $i>1 ;$i--){
        $factorial=$factorial*$i;
    }
    echo "El factorial de $num es $factorial";
 }
 elseif ($num>=0) {
    echo "El número no es entero";
 }
 elseif ($num-(int)$num==0) {
    echo "El número no es positivo";
 }
 else {
    echo "El número no es ni positivo ni entero";
 };

?>

</body>
</html>