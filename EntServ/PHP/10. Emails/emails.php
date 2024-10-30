1 <?php
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
	$mail->Username   = "69629862a446c6"; 
	// introducir clave
	$mail->Password   = "d52e605a66a13d";   	
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
	echo "<br><p style='color: green'>Enviado</p>";
	}
}