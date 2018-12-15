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
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "coffee");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	$num = $_POST['num'];
	$quantite = $_POST['quantite'];      			
	$email = $_POST['email'];
	$produit = "confiture";
	
	$total = $quantite*10;                      
 
// Attempt insert query execution
$sql = "INSERT INTO client (nom,prenom,adresse,email,num,quantite,produit,total)
					  VALUES('$nom','$prenom','$adresse', '$email ', '$num ','$quantite','$produit','$total')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
	header('location: index.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

try {
    //Server settings
   // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
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
	 $mail->setFrom('anajah.2018.mail@gmail.com', 'anajah');
	$mail->addAddress($email, 'Mailer');
   
                 // Name is optional
   
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

   

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'commande';
   

  
	$mail->Body    =  "hey" ;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>

?>