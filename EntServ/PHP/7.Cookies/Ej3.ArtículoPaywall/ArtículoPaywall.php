<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <?php
        if (!isset($_COOKIE["visitas"]) || $_COOKIE["visitas"] <= 5 || $_COOKIE["premium"] == "activado") {
          if (!isset($_COOKIE["visitas"])) {
            setcookie("visitas", 2 , time() + 3600);
          }
          if (!isset($_COOKIE["premium"])) {
            setcookie("premium", "desactivado" , time() + 999999);
          }

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
                <div>
                <h1>ALGUIEN HA SALTADO DE UN DECIMOCTAVO PISO Y HA SOBREVIVIDO SIN HACER WATERDROP</h1>
                <p>Impactante milagro en la ciudad: hombre sobrevive a una caída de un décimoctavo piso

                En un hecho sorprendente que ha dejado a los testigos y a los servicios de emergencia perplejos, un hombre ha sobrevivido a una caída desde el décimoctavo piso de un edificio residencial en el centro de la ciudad sin sufrir lesiones graves. Lo más increíble es que la víctima, cuya identidad aún no ha sido revelada, aterrizó en el pavimento sin siquiera hacer un "waterdrop" —el término coloquial para describir la forma en que el cuerpo impacta al caer desde grandes alturas— lo cual, según expertos, debería haber sido letal.

                <h4>El incidente</h4>
                El suceso ocurrió alrededor de las 9:00 de la mañana, cuando varios vecinos alertaron a los servicios de emergencia tras ver al hombre caer a una velocidad vertiginosa. Según las primeras investigaciones, el individuo, de aproximadamente 35 años, saltó deliberadamente desde su apartamento situado en el piso 18. Contra todo pronóstico, el hombre no solo sobrevivió a la caída, sino que también quedó consciente tras el impacto, lo que ha generado una ola de asombro en la comunidad y en el cuerpo médico.

                <h4>Una escena inesperada</h4>
                Testigos presenciales quedaron atónitos al ver cómo el hombre aterrizaba en la acera sin realizar el "waterdrop", el cual suele ocasionar la fractura instantánea de varios huesos, hemorragias internas e, inevitablemente, la muerte. “No podía creerlo. Parecía una película de acción. Simplemente cayó, pero no rebotó ni se esparció. Quedó ahí, como si nada”, relató uno de los testigos.

                as autoridades cerraron el área de inmediato, y los servicios de emergencia trasladaron al hombre a un hospital cercano para ser evaluado. “Cuando llegamos, estaba consciente y hablando, aunque aturdido”, explicó un paramédico. “No puedo explicar cómo es posible que haya sobrevivido. Su cuerpo no muestra las lesiones típicas de una caída desde esa altura”.

                <h4>¿Un caso de suerte o física inexplicable?</h4>
                Expertos en traumatología y física aún están analizando el suceso. Según el Dr. Jorge Martínez, médico de la Unidad de Traumatología del Hospital Central, “la probabilidad de sobrevivir a una caída desde más de seis pisos es casi nula. Y más aún sin sufrir lesiones catastróficas. Lo único que podría explicar este fenómeno es un conjunto de factores extraordinarios: la velocidad del viento, el ángulo de caída y tal vez el lugar exacto en el que aterrizó”.

                En efecto, el lugar del impacto no presenta ningún indicio de amortiguación evidente, como árboles, toldos o cualquier otra estructura que pudiera haber ralentizado la caída. Los investigadores también consideran la posibilidad de que la manera en que el hombre saltó haya afectado la distribución del peso y la forma de su cuerpo al caer, permitiendo un aterrizaje que rompiera con las leyes convencionales de la física.

                <h4>La reacción de la comunidad</h4>
                El incidente ha generado un intenso debate en redes sociales, con usuarios sugiriendo teorías que van desde intervenciones sobrenaturales hasta ideas extravagantes sobre el "control mental del cuerpo". Algunos incluso han comparado al hombre con superhéroes de películas. Sin embargo, el suceso también ha reavivado la conversación sobre la importancia de la salud mental y la prevención de estos eventos en la ciudad.

                Las autoridades han pedido a la comunidad que respete la privacidad del individuo y de su familia, recordando que este tipo de eventos son complejos y deben abordarse con sensibilidad. “Más allá de lo asombroso de la supervivencia, debemos enfocarnos en ofrecer apoyo y recursos a quienes pasan por momentos difíciles”, señalaron representantes de salud pública.

                <h4>Un desenlace aún por esclarecer</h4>
                Por el momento, el hombre se encuentra en condición estable en el hospital y los médicos continúan realizándole pruebas para evaluar posibles lesiones internas que no sean evidentes de inmediato. El caso está siendo investigado y el personal de salud mental ya ha comenzado a intervenir para entender las circunstancias que llevaron a este evento.

                En definitiva, esta historia, más allá de ser un suceso increíble y casi milagroso, es un recordatorio de que incluso en situaciones aparentemente imposibles, la vida puede sorprendernos de formas inexplicables.</p>
                </div>
                <?php 
                if (isset($_COOKIE["premium"]) && $_COOKIE["premium"] == "activado") {
                   echo "Eres un usuario <b>premium</b>. Puedes leer sin restricciones";
                } else {
                if (isset($_COOKIE["visitas"])) {
                 echo "Esta es tu visita número " . $_COOKIE["visitas"] . ". Te quedan " . 5-$_COOKIE["visitas"] . " visitas gratuitas"; 
                setcookie("visitas", $_COOKIE["visitas"] + 1, time() + 3600); 
                } else {
                    echo "¡Bienvenido! Esta es tu primera visita. Te quedan 4 visitas gratuitas.";
                }} ?>
                
            <?php } elseif ($lan=="it") {?>

                <a href="ElegirIdioma.php">Seleccionato lenguayi </a>
                <h1>Prosciutto pizza mario bros</h1>
                <p>mama mia</p>
                <?php
                if (isset($_COOKIE["premium"]) && $_COOKIE["premium"] == "activado") {
                    echo "Buongiorno <b>premium</b> user. Molte leer sin obstculos.";
                } else {
                if (isset($_COOKIE["visitas"])) {
                 echo "Molto bono " . $_COOKIE["visitas"] . ". Pasta " . 5-$_COOKIE["visitas"] . " visitachione grachie"; 
                setcookie("visitas", $_COOKIE["visitas"] + 1, time() + 3600); 
                } else {
                    echo "¡Bienvenutte! Presto diquesto 4 grachie visualitatione.";
                }}?>

        <?php } elseif ($lan=="prt") { ?>

            <a href="ElegirIdioma.php">Selecshon de lenguayi </a>
            <h1>Madeiro pasdrinho pepeeeee</h1>
            <p>aaaaaaaaaaaaaaaaaaaa</p>
            <?php
            if (isset($_COOKIE["premium"]) && $_COOKIE["premium"] == "activado") {
                echo "Tengo tu dinerinho usuerio <b>premium</b>. Ya es feasible leer librement.";
            } else {
            if (isset($_COOKIE["visitas"])) {
                 echo "Tremendinho, obrigado " . $_COOKIE["visitas"] . ". Sao Paulo " . 5-$_COOKIE["visitas"] . " gratinhos visiteiras";
                setcookie("visitas", $_COOKIE["visitas"] + 1, time() + 3600); 
                } else {
                    echo "¡OBRIGADOOOO!. Primeira visiteira. Te quedam 4 vistas gratisinhas";
                }}?>


   <?php } 

    }  else {
        if (isset($_POST["idioma"])){
            $lan = $_POST["idioma"];
        } else {
            $lan = $_COOKIE["idioma"];  
        }
        switch ($lan) {
            case 'es':
                echo '<a href="ElegirIdioma.php">Seleccionar Idioma </a>';
                echo "<h1> NO PUEDES ACCEDER, YA LLEVAS " . $_COOKIE["visitas"] . " VISITAS. </h1> <br>";
                echo '<h2> Pagar Premium Por 1€ </h2>';
                setcookie("visitas", $_COOKIE["visitas"] + 1, time() + 3600);
                setcookie("idioma", "es", time() + 3600);
                break;
            
            case 'it':
                echo '<a href="ElegirIdioma.php">Seleccionato lenguayi </a>';
                echo "<h1> MOLTO POBRE? " . $_COOKIE["visitas"] . " VISIT ANTERIORI. </h1> <br>";
                echo '<h2> Pagan pat 1€ </h2>';
                setcookie("visitas", $_COOKIE["visitas"] + 1, time() + 3600);
                setcookie("idioma", "it", time() + 3600);
                break;    
                
            case 'prt':
                echo '<a href="ElegirIdioma.php">Selecshon de lenguaye </a>';
                echo "<h1> ERES UN LISTINHO. VAS " . $_COOKIE["visitas"] . " VISITEIRAS. </h1> <br>";
                echo '<h2>  A pagar 1€ </h2>';
                setcookie("visitas", $_COOKIE["visitas"] + 1, time() + 3600);
                setcookie("idioma", "prt", time() + 3600);
                break;
        } ?>
        <form method="post">
        TARJETA:<input type="text" name="n_tarjeta">
        <input type="submit" value="Pagar" />
        <?php
        if (isset($_POST["n_tarjeta"])) {
            if (is_numeric($_POST["n_tarjeta"])) {
                if (strlen($_POST["n_tarjeta"]) == 12){
                    echo '<p style="color: green"> PAGO PROCESADO.</p> <a href="ArtículoPaywall.php"> EMPEZAR A LEER </a>';
                setcookie("premium", "activado", time() + 9999999);
                setcookie("visitas", 0, time() + 3600);
                } else {
                    echo '<p style="color: red"> LONGITUD DE CIFRA INVÁLIDA </p>';
                    setcookie("visitas", $_COOKIE["visitas"], time() + 3600);
                }
        } else {
            echo '<p style="color: red"> EL NÚMERO DE TARJETA DEBE SER UN NÚMERO </p>';
            setcookie("visitas", $_COOKIE["visitas"], time() + 3600);
        }
    } }?>

    </body>
</html>