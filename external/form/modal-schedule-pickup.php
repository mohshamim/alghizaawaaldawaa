<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mailwebsmirno@gmail.com';                     //SMTP username
    $mail->Password   = 'mail0web_smirnoQ';                               //SMTP password
    $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('mailwebsmirno@gmail.com', 'ProLaundry');
    $mail->addAddress('youremail@gmail.com', 'ProLaundry');     //Add a recipient

    //Passed variables
    $name = $_POST['name'];
    $email = $_POST['email'];
	$phonenumber = $_POST['phone'];
	$modalAddress = $_POST['modalAddress'];
	$service = $_POST['service'];
	$datePickUp = $_POST['date-pick-up'];
	$dateDelivery = $_POST['date-delivery'];
	$message = $_POST['message'];

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is what was sent ProLaundry, form "Schedule a Pickup"';
    $mail->Body    =
    	'Name: ' .$name.
    	'<br>E-mail: ' .$email.
    	'<br>Phone: ' .$phonenumber.
    	'<br>Address: ' .$modalAddress.
    	'<br>Service: ' .$service.
    	'<br>Date Pick Up: ' .$datePickUp.
    	'<br>Date Delivery: ' .$dateDelivery.
    	'<br>message: ' .$message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
