<html>
   <head>
       <style>
           p {color: purple}
       </style>
   </head>
   <body>
   <?php
   $num = 1;
   $aux = 0;
   echo $aux . " - ";
   echo $num;
   $num += 1;
   for ($i=0; $i < 100; $i++) {
   echo " - " . $num;
   $aux = $num;
   $num += $aux;
   }
   ?>


       <p>Fibonacci</p>
   </body>
</html>