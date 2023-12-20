<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
    <!-- bootstrap csss -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- bootsrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <div class="logo">
            <h1>university erp system</h1>

        </div>
        
        <form action="" method="POST">
            <div class="form-floating mb-3 ">
                <input type="text" name="uid" class="form-control" id="floatingInput" placeholder="faculty uid">
                <label for="floatingInput">Faculty Id</label>
            </div>
            <!-- <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div style="text-align: left; padding: 16px 9px;">
                <a href="#">forget password</a>
            </div> -->
            



            <!-- new buttons -->
            <div class="d-grid gap-2">
                
                <button class="btn btn-primary" type="submit" name="login">Reset Password</button>
            </div>
        </form>
    </div>
    
</body>
</html>



<!-- php start here -->


<?php
    include "../admin/connect_db.php";
    
    
    
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    if(isset($_POST['login'])){
        $uid=$_POST['uid'];
        if(!empty($uid)){
            if($conn){
                $row;
                $sql="select fid , email , name from faculty_details where fid = '$uid'";
                
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                        $email=$row['email'];
                        $name=$row['name'];
                        
                    }
                    
                    
                    
                    
    
                    require 'src/Exception.php';
                    require 'src/PHPMailer.php';
                    require 'src/SMTP.php';
    
                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);
    
                    try {
    
                       
                        
                        
    
                        
    
    
    
    
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
                        $mail->addAddress($email,$name);     //Add a recipient
                        
                        
                        //Attachments
                        
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'link for reseting password is below ';
                        // code for making link for reset password
                        $link= "<a href='http://localhost/chalkpad/faculty/resetpass.php?fid=$uid' >link to change password </a>";
                        // echo $link;
                        // die();
                        $mail->Body    = 'Hello , '.strtoupper($name) .'<br><br><br>The the link for reseting password is  :-<br><br> <b>'.$link.'<b>';
                        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
                        $mail->send();
    
    
                        // echo 'Message has been sent';
                        // header("Location:http://localhost/chalkpad/faculty/index.php");
                        ?>
                            <script>
                                alert("a link for change password is sent to your email ");
                                window.location.href="index.php";
                            </script>
                        <?php
    
    
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
    
                }
                else{
                    echo "<script>alert('invalid id ');</script>";
                }
                
                
            }
            else{
                echo "<script>alert('databasse not connected ');</script>";
    
            }

        }
        else{
            echo "<script>alert(' fid cant be empty ');</script>";;
        }
        
    }
    

?>






