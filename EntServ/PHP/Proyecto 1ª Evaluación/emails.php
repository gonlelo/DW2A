<?php
use PHPMailer\PHPMailer\PHPMailer;
function enviarEmail($destino, $nombre, $origen, $asunto, $mensaje){

 	$mail = new PHPMailer();
 	$mail->IsSMTP();
 	// cambiar a 0 para no ver mensajes de error
// Looking to send emails in production? Check out our Email API/SMTP product!

 	$mail->SMTPDebug  = 0; 							
 	$mail->SMTPAuth   = true;
 	$mail->SMTPSecure = "tls";                 
	$mail->Host       = "sandbox.smtp.mailtrap.io";    
	$mail->Port       = 2525;                 
	// introducir usuario de google
	$mail->Username   = "8046f19602f019"; 
	// introducir clave
	$mail->Password   = "ff2f70cffa04bf";   	
	$mail->SetFrom($origen, 'Test');
	// asunto
	$mail->Subject    = "$asunto";
	// cuerpo
	$mail->MsgHTML($mensaje);
	// adjuntos
	$mail->addAttachment("empleado.xsd");
	// destinatario
	$address = $destino;
	$mail->AddAddress($address, $nombre);
	// enviar
	$resul = $mail->Send();
	if(!$resul) {
	  echo "Error" . $mail->ErrorInfo;
	} else {
	return 5;
	}
    
}
?>