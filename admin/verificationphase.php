<?php  
    include "sesson_check.php";
    include "connect_db.php";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .container{
            display:flex;
            justify-content:center;
            align-items:center;
            width: auto;
            height: 100vh;
            flex-wrap:wrap;
            /* border:2px solid black; */
        }
        input,label,button{
            display:block;
            margin:13px;
            

        }
        form{
            border-radius:23px;
            
            /* border:2px solid blue; */
            padding:25px;
            background-color:white;
            font-size: 22px;
            font-weight: bold;
            font-style: sans-serif;
            font-family: sans-serif;
            /* flex-direction:column; */
        }
        button{
            background-color:blue;
            color:white;
            text-transform:uppercase;
            font-weight:bolder;
            padding:10px;
        }
        body{
            background-color: grey;
        }
        input{
            border: 1px solid;
            height: 25px;
            width: 187px;
            border-radius: 9px

        }
    </style>

</head>
<body>
    <script>
        
        Swal.fire("Enter OTP Sent To Your Email!");
    </script>
    <div class="container">


        <form method="POST" action="">
            <label for="opt">Enter OTP</label>
            <input type="number" id="opt" name="otp">
            <button name="btn">Verify OTP</button>

        </form>
        



        
    </div>
</body>
</html>
<?php
    if(isset($_POST['btn'])){
        if($conn){
            $otp=$_POST['otp'];


            // echo "otp is  :$otp";

            $query="SELECT uid , otp,verify FROM admin_otp WHERE uid={$_SESSION["uid"]} and otp=$otp AND verify=0";
            $result=mysqli_query($conn,$query);
            $count=mysqli_num_rows($result);
            
            if($count>0){
                
                $sql="UPDATE admin_otp SET verify =1 WHERE otp=$otp";
                mysqli_query($conn,$sql);
                ?>
                    <script>
                        // Swal.fire("Login Success!");
                        Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Login Success",
                        showConfirmButton: false,
                        timer: 1500
                        });
                        
                        setTimeout(function(){
                            window.location.href = "admin_drashboard.php";
                        }, 2000);
                        
                    </script>
                <?php
                
                                
            }
            else{
                ?>
                    <script>alertSwal.fire("Incorrect OTP!");</script>
                <?php

            }
            
        }
        else{
            echo "database is  not conected ";
        }
        
    }

?>
