<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <?php

    if (isset($_POST["idioma"])){
        setcookie("idioma", $_POST["idioma"], time() + 3600);
        $lan = $_POST["idioma"];
    } elseif (isset($_COOKIE["idioma"])) {
        $lan = $_COOKIE["idioma"];
    } else{
        $lan = "es";
        setcookie("idioma", "es", time() + 3600);
    }

    if ($lan=="es") { ?>

        <a href="ElegirIdioma.php">Seleccionar Idioma </a>
        <h1>ALGUIEN HA SALTADO DE UN DECIMOCTAVO PISO Y HA SOBREVIVIDO SIN HACER WATERDROP</h1>
        <p>Suena como una historia inventada, porque lo es</p>  

    <?php } elseif ($lan=="it") {?>

        <a href="ElegirIdioma.php">Seleccionato lenguayi </a>
        <h1>Prosciutto pizza mario bros</h1>
        <p>mama mia</p>

   <?php } elseif ($lan=="prt") { ?>

    <a href="ElegirIdioma.php">Selecshon de lenguayi </a>
    <h1>Madeiro pasdrinho pepeeeee</h1>
    <p>aaaaaaaaaaaaaaaaaaaa</p>

   <?php } ?>

    </body>
</html>