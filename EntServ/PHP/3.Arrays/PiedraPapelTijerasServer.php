<html>
<head></head>
<body>
<?php 
$piedraPapelTijera=["piedra", "papel", "tijera"];
$imagenes= ['<img width=10% src="https://images.vexels.com/content/145879/preview/stone-rock-illustration-2c0686.png">', '<img width=10% src="https://static.vecteezy.com/system/resources/previews/009/340/333/original/white-crumpled-paper-balls-for-design-element-png.png">', '<img width=10% src="https://cdn-icons-png.flaticon.com/512/5511/5511075.png">'];
$ServerSaca = rand(0,2);


if (isset($_GET['UsuarioSaca']) && $_GET['UsuarioSaca']>=0 && $_GET['UsuarioSaca']<=3) {
    $UsuarioSaca = $_GET['UsuarioSaca'];
    echo "El usuario saca ".$piedraPapelTijera [$UsuarioSaca]."<br>".$imagenes[$UsuarioSaca]."<br>";
    echo "El servidor saca ".$piedraPapelTijera [$ServerSaca]."<br>".$imagenes[$ServerSaca] . " <br> ";
    if ($UsuarioSaca== $ServerSaca) {
        echo "¡Empate!";
    }elseif ($UsuarioSaca==$ServerSaca+1 && $UsuarioSaca!=0) {
        echo "¡Tú ganas!";
    }elseif ($UsuarioSaca==0 && $ServerSaca==2) {
        echo "¡Tú ganas!";
    } else{
        echo "¡El servidor gana!";
    }

}else {
    echo 'No has sacado nada o el número no se corresponde a una jugada. Añade "?UsuarioSaca=X" a la URL siendo X 0 (piedra), 1 (papel) o 2 (tijeras).' ;
}

?>

</body>
</html>