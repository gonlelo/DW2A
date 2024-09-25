<html>
<head></head>
<body>
<?php
$num1=rand(0,9);
$num2=rand(0,9);
$num3=rand(0,9);
$num4=rand(0,9);
$num5=rand(0,9);
$num6=rand(0,9);
$num7=rand(0,9);
$num8=rand(0,9);
$numString="$num1$num2$num3$num4$num5$num6$num7$num8";
$posición=(int)$numString%23;
$Letras="TRWAGMYFPDXBNJZSQVHLCKE";
$letra=$Letras[$posición];

echo $numString.$letra;

?>
</body>
</html>
