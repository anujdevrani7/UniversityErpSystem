<?php


include "sesson_check.php";
include "connect_db.php";


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    // logic start  for otp generator
    $otp=rand(100000,999999);
    // echo $otp;
    $sql="insert into admin_otp(otp,verify,uid)values($otp,0,{$_SESSION["uid"]})";
    $result=mysqli_query($conn,$sql);


    // $tempmail='anujdevrani007@gmail.com';
    // if($result){
    //     echo "row entered success fully ";
    // }
    
    

    




    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;   
    //Enable verbose debug output




    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'anujkaku122@gmail.com';                     //SMTP username
    $mail->Password   = 'vdmvplfoqzkbviah';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('anujkaku122@gmail.com', 'university erp system');
    $mail->addAddress($_SESSION["email"],$_SESSION["name"]);     //Add a recipient
    
    
    //Attachments
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'otp verification';
    $mail->Body    = 'Hello , '.strtoupper($_SESSION["name"]) .'<br><br><br>The otp for login into unversity erp system is :-<br><br> <b>'.$otp.'<b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();


    // echo 'Message has been sent';
    header("Location:verificationphase.php");
    


} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>