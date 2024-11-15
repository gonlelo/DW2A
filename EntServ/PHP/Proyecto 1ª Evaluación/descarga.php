<?php
if (isset($_GET['ruta'])) {

if (file_exists($_GET['ruta'])) {
				// Establece los encabezados para forzar la descarga
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename="' . basename($_GET['ruta']) . '"');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($_GET['ruta']));
				
				// Leer el archivo y enviar el contenido al navegador
				readfile($_GET['ruta']);
				exit;
			} else {
				echo "Archivo no encontrado.";
			}
        }else {
            echo "Ruta no proporcionada.";
        }
?>