<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function SendMail($to, $message){

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                     
        $mail->Host       = 'smtp.yandex.ru';                   
        $mail->SMTPAuth   = true;                               
        $mail->Username   = 'HeHub@yandex.ru';            
        $mail->Password   = 'dvreuevwtfipjveq';                      
        $mail->SMTPSecure = 'ssl';           
        $mail->Port       = 465;                                 

        $mail->setFrom('HeHub@yandex.ru', 'TestPHP');
        $mail->addAddress($to, 'Joe User');    
        

        $mail->isHTML(true);                                 
        $mail->Subject = "super secret password";
        $mail->Body    = $message;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


function getPassword($length = 8)
{				
	$chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP'; 
	$size = strlen($chars) - 1; 
	$password = ''; 
	while($length--) {
		$password .= $chars[random_int(0, $size)]; 
	}
	return $password;
}