<?php
require_once "bootstrap.php";
require_once './src/Equipo.php';

if (isset($_GET['idequipo'])) {
    
    $equipo = $entityManager->find('equipo' , $_GET['idequipo']);
    if (!$equipo) {
        echo "Equipo " .  $_GET['idequipo'] . " no encontrado";
    }else {
    echo "<strong>Equipo: cuyo nombre es '" . $equipo->getNombre() . "'</strong><br>";
    echo "Fundación: ". $equipo->getFundacion(). "<br>Socios: ". $equipo->getSocios(). "<br>Ciudad: ". $equipo->getCiudad()."<br>";
    }

}else {
    echo "Parámetro no encontrado";
}