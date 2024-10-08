<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php 
        if (isset($_COOKIE["usuario"])) {
            echo "Eres el usuario " . $_COOKIE["usuario"];
        }else {
            echo "Es la primera vez que visitas";
            setcookie("usuario", "Gonzalo", time()+3600);
            echo "<br> toma cookie";
        }
       
        ?>

    </body>
</html>