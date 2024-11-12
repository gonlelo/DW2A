<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <style>
        table{
            border-collapse: collapse;
        }
    td input:first-of-type { 
        display: none;
    }
    </style>
    </head>
    <body>
<?php

echo "<h1>Estas son las mejores palabras sin tilde. Tildes = Demonio</h1>";
       $cadena_conexion = 'mysql:dbname=basecita;port=3306;host=localhost;charset=utf8mb4';
       $usuario = 'root';
       $clave = '';

           $bd = new PDO($cadena_conexion, $usuario, $clave);

           if(isset($_POST['palabra']) && isset($_POST['observaciones']) && !isset($_POST['eliminar'])){
            $tilde = false;
            $vocalesConTilde = ['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú'];
    
            foreach ($vocalesConTilde as $vocal) {
                if (strpos($_POST['palabra'], $vocal) !== false) {
                    $tilde = true;
                }
                if (strpos($_POST['observaciones'], $vocal) !== false) {
                    $tilde = true;
                }
            }
            if($tilde == false){
            $sql ="INSERT INTO mejoresPalabrasSinTilde (palabra, observaciones) VALUES ('{$_POST['palabra']}', '{$_POST['observaciones']}')";
            $bd->exec($sql);
            }
        }

        if(isset($_POST['eliminar'])){
            $id = (int)$_POST['eliminar'];
            $sql ="DELETE FROM mejoresPalabrasSinTilde WHERE id = $id ;"; 
            $bd->exec($sql);
        }
        


           


           $sql = 'SELECT id, palabra, observaciones, fecha_registro FROM mejoresPalabrasSinTilde';
           $resultado = $bd->query($sql); 

            echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Palabra</th>
                <th>Observaciones</th>
                <th>Fecha de registro</th>
            </tr>";

           foreach ($resultado as $res) {
            echo "<tr>";
               echo "<td>" . $res['id'] . "</td>";
               echo "<td>" . $res['palabra'] . "</td>";
               echo "<td>" . $res['observaciones'] . "</td>";
               echo "<td>" . $res['fecha_registro']. "</td>";
               echo "<td>" . '  <form action="index.php" method="post">
                                <input type="text" id="eliminar" name="eliminar" value="' .  $res['id'] . '">
                                <input type="submit" value="Eliminar">
                                </form>';
            echo "</tr>";
           } ?>
</table> 
<br><br><br>
<form action="index.php" method="post"> 
<label for="palabra">Palabra</label><br> <input type="text" id="palabra" name="palabra" maxlength="50" rows="10" placeholder="SIN TILDE" required><br><br> 
<label for="observaciones">Observaciones:</label><br> <textarea id="observaciones" name="observaciones" maxlength="100" rows="5" cols="40" placeholder="Las observaciones tampoco deben llevar tilde. Odiamos las tildes." required></textarea><br><br> 
<button type="submit">Enviar</button>
</form>
<?php
if(isset($_POST['palabra']) && isset($_POST['observaciones']) && $tilde == true){
    echo"<p style='color: red'>BLASFEMIA. Las tildes no son permitidas por estos lares. Vuelve a intentarlo";
}
?>

</body>
</html>