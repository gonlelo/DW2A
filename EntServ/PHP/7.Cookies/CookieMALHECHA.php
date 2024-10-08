<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php 
        setcookie("usuario", "Gonzalo", time()+3600);
        echo "toma cookie";
        
        echo "Eres el usuario " . $_COOKIE["usuario"];
        ?>



    </body>
</html>