
<?php
require './PHPMailer.php';
require './Exception.php';
require './/SMTP.php';

$email = "anajah.2018.mail@gmail.com";
$password = "aezakmi2009";
$to_id = "jadina73@gmail.com";
$message = "test";
$subject = "tets";
$mail = new PHPMailer\PHPMailer\PHPMailer(true);; 

try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();    
	$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
	// Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'anajah.2018.mail@gmail.com';                 // SMTP username
    $mail->Password = 'aezakmi2009';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
	 $mail->setFrom('anajah.2018.mail@gmail.com', 'nouali');
	$mail->addAddress('m.nouali.m@gmail.com', 'Mailer');
   
                 // Name is optional
   
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

   

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
