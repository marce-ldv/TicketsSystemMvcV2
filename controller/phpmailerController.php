<?php

namespace controller;
use controller\Controller as Controller;

class phpmailerController extends Controller{

  public function index(){

  }

  public function send($data = []){
    
    if (empty($data)) $this->redirect("/default/");

    // TODO https://www.lifewire.com/what-are-the-gmail-smtp-settings-1170854

    $emailContact = $data['emailContact'];
    $msgContact = $data['msgContact'];

    $destinatario = "marcelo.docutec@hotmail.com"; //a quien se lo voy a mandar

    // Datos de la cuenta de correo utilizada para enviar vía SMTP
    $smtpHost = "mail.tudominio.com";  // Dominio alternativo brindado en el email de alta
    $smtpUsuario = "correo@tudominio.com";  // Mi cuenta de correo
    $smtpClave = "123456789";  // Mi contraseña


    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = "utf-8";

    // VALORES A MODIFICAR //
    $mail->Host = $smtpHost;
    $mail->Username = $smtpUsuario;
    $mail->Password = $smtpClave;


    $mail->From = $emailContact; // Email desde donde envío el correo.
    $mail->FromName = "fromName";
    $mail->AddAddress($destinatario); // Esta es la dirección a donde enviamos los datos del formulario

    $mail->Subject = "Test Formulario desde el Sitio Web"; // Este es el titulo del email.
    $mensajeHtml = nl2br($msgContact);
    $mail->Body = "
    <html>

    <body>

    <h1>Recibiste un nuevo mensaje de Ticket System</h1>

    <p>Informacion enviada por el usuario de la web:</p>


    <p>email: {$emailContact}</p>

    <p>mensaje: {$msgContact}</p>

    </body>

    </html>

    <br />"; // Texto del email en formato HTML
    $mail->AltBody = "{$msgContact} \n\n "; // Texto sin formato HTML
    // FIN - VALORES A MODIFICAR //

    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );

    $estadoEnvio = $mail->Send();
    if($estadoEnvio){
      echo "El correo fue enviado correctamente.";
    } else {
      echo "Ocurrió un error inesperado.";
    }

    /*
    $mail = new PHPMailer(true);

    try {
    //Config de php mailer
    $mail->isSMTP();
    $mail->Host = 'smtp@gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ticketssystem@utn.com';
    $mail->Password = '';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Config correo a enviar
    $mail->setFrom('marcelo.docutec@gmail.com');
    $mail->addAddress('marcelo.docutec@gmail.com', 'Marcelo Sanchez');

    $mail->Subject = 'Testeando Enviar Emails';
    $mail->Body    = 'This is the HTML message body';
    $mail->send();
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');

    //Content
    /*
    $mail->isHTML(true);


    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


    echo 'Message has been sent';

  } catch (Exception $e) {
  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
*/
}

}
