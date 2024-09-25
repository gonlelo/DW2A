<html>
<head></head>
<body>
<?php 
$piedraPapelTijera=["piedra", "papel", "tijera"];
var_dump ($piedraPapelTijera);


if (isset($_GET['UsuarioSaca'])) {
    $UsuarioSaca = $_GET['UsuarioSaca'];
    echo "El usuario saca ".$piedraPapelTijera [$UsuarioSaca];
}else {
    echo "No has sacado nada";
}

?>

</body>
</html>