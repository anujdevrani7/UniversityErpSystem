<?php error_reporting(0)?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <!-- sweet alerts link  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- bootstrap csss -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- bootsrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
        body{
            /* background:url('https://images.pexels.com/photos/3772511/pexels-photo-3772511.jpeg'); */
            /* background:url('https://images.pexels.com/photos/270694/pexels-photo-270694.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'); */
            /* background:url('../images/staffback.jpg'); */
            background:url('https://images.pexels.com/photos/267586/pexels-photo-267586.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
            background-size: cover; 

            background-position: center; 
            background-repeat: no-repeat; 
            
        }
        .logo h1{
            text-transform: uppercase;
        }
        .container{
            padding: 37px;
        }
        
    </style>
</head>
<body>
    <div class="container"style="border-radius: 12px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);">
        <div class="logo">
            <h1>university erp system</h1>

        </div>
        
        <form action="" method="POST">
            <div class="form-floating mb-3 ">
                <input type="text" name="uid" class="form-control" id="floatingInput" placeholder="enter uid">
                <label for="floatingInput">admin id</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            



            <!-- new buttons -->
            <div class="d-grid gap-2">
                
                <button class="btn btn-primary" type="submit" name="login">Login</button>
            </div>
        </form>
    </div>
    
</body>
</html>



<!-- php start here -->


<?php
    include "connect_db.php";
    if($conn){
        if(isset($_POST['login'])){
            $uid=$_POST['uid'];
            $password=$_POST['password'];
            if(empty($uid)){
                ?>
                    <script>
                        // alert("");
                        // Swal.fire({
                        //     icon: "error",
                        //     title: "Oops...",
                        //     text: "uid cant be empty ",
                            
                        // });
                        Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "uid cant be empty ",
                        showConfirmButton: false,
                        timer: 1500
                        });
                    </script>
                <?php

            }
            elseif(empty($password)){
                ?>
                    <script>
                        // alert("");
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "password cant be empty  ",
                            
                        });
                    </script>
                <?php

            }


            // echo "$uid";
            // echo "$password";

            else{
                $query="select name,email , id , pass from admin where id = $uid and binary pass= '$password'";
                $result=mysqli_query($conn,$query);
                $count=mysqli_num_rows($result);

                if($count>0){
                    while($row=mysqli_fetch_assoc($result)){
                        

                        session_start();
                        
                        $_SESSION["uid"]=$row['id'];
                        $_SESSION["pwd"]=$row['pass'];
                        $_SESSION["name"]=$row['name'];
                        


                        
                        $_SESSION["email"]=$row['email'];

                        // echo $_SESSION["email"];
                        // die();
                        
                        
                        
                        header("Location:verifyotp.php");
                        
                    }

                }
                else{
                    ?>
                        <script>
                            // alert("");
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Incorrect Password or Username  ",
                                
                            });
                        </script>
                    <?php
                    // header("Location:invalididpass.php");
                }
            
            }
        }
    }
    else{
        ?>
            <script>
                alert("data base is not connected ")
            </script>
        <?php
    }
?>










