<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
<?php 
    $var1 = 20;                    //Debería no asignar ningún valor pero sale error asi que lo dejo como int
    $var2 = 11.3;
    $var3 = "Cadena";
    $var4 = true;

    echo "<table>
            <tr>
              <td>$var1</td>
              <td>", gettype($var1), "</td>
            </tr>
            <tr>
              <td>$var2</td>
              <td>", gettype($var2), "</td>
            </tr>
            <tr>
              <td>$var3</td>
              <td>", gettype($var3), "</td>
              </tr>
            <tr>
              <td>$var4</td>
              <td>", gettype($var4), "</td>
            </tr>
            <tr>
        ";
?>
        

    </body>
</html>