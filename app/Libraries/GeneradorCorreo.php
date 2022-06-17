<?php

namespace App\Libraries;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class GeneradorCorreo
{
  public function enviarVCard($datosUsuario, $correoDestino)
  {
    helper('datos_tarjeta');
		$d = $datosUsuario;

		$nomApePropietario = getNomApe($d);
		$correoPropietario = getCorreoPrincipal($d)['url'];
		$linkTarjeta = getLinkTarjeta($d);
		$empresaPropietario = $d['empresa']['nombre'];
		$nombreVCard = str_replace(' ', '-', $nomApePropietario) . ".vcf";

		$mail = new PHPMailer(true);

		try {
			//Server settings
			// $mail->SMTPDebug  = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->CharSet = "UTF-8";
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'mail.tarjetita.vip';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'noreply@tarjetita.vip';                     //SMTP username
			$mail->Password   = 'DS+wZp+M[EsB';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('noreply@tarjetita.vip', $nomApePropietario);
			$mail->addAddress($correoDestino);     //Add a recipient

      $generadorVCard = new GeneradorVCard();
      $generadorVCard->generarVcard($datosUsuario, 'GUARDAR');

			//Attachments
			$mail->addAttachment('tmp/tmpvcard.vcf', $nombreVCard);         //Add attachments

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Solicitud de envío por email de Tarjeta de Digital';
			$mail->Body    = "
			<div style='font-family: sans-serif;'>
				<p>Este email ha sido enviado desde la Tarjeta Digital por su titular o por un receptor de la tarjeta que quiere presentarte al titular y que sabe tu correo electrónico.</p>
		
				<p>TARJETA DIGITAL:</p>
		
				<div style='padding: 10px; border: 1px solid gray; border-radius: 10px; background-color: lightgray;'>
					<p style='margin: 0;'><span style='font-size: 22px; font-weight: bold;'>$nomApePropietario</span> ($correoPropietario)</p>
					<p style='font-weight: bold; font-size: 22px; text-transform: uppercase; margin: 0;'>$empresaPropietario</p>
					<p style='font-weight: bold; font-size: 22px; margin: 0;'><a href='$linkTarjeta'>Abrir la Tarjeta Digital y los Contenidos integrados</a></p>
					<p>Puedes acceder directamente a la tarjeta con el enlace que se facilita, o descargar la vCard adjunta en este email, que podrás guardar en cualquier agenda de contactos o CRM.</p>
					<p>Recuerda que la vCard incluye el acceso directo a la tarjeta digital y que desde ella se accede a los contenidos actualizados en todo momento.</p>
				</div>
		
				<div style='border: 1px solid lightgray; margin: 35px 0;'></div>
		
				<p>Email automático generado por el sistema de Tarjetas Digitales de: <a href='http://tarjetita.vip/CEmpresarial/WC'>tarjetita.vip</a></p>
			</div>";
			$mail->AltBody = "";

			$mail->send();
			return true;
      // echo 'Message has been sent';
		} catch (\Exception $e) {
			// echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return false;
		}
  }
}