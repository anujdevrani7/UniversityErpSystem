<?php
    // include "sesson.php";
    include "../admin/connect_db.php";
?>
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
<style>
    body{
        /* background:url('https://images.pexels.com/photos/1925536/pexels-photo-1925536.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'); */
        /* background:url('https://images.pexels.com/photos/2008145/pexels-photo-2008145.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'); */
        /* background:url('https://images.pexels.com/photos/92905/pexels-photo-92905.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'); */
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
<body>
    <div class="container" style="border-radius: 12px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);">
        <div class="logo">
            <h1>university erp system</h1>

        </div>
        
        <form action="" method="POST">
            <div class="form-floating mb-3 ">
                <input type="text" name="uid" class="form-control" id="floatingInput" placeholder="faculty uid">
                <label for="floatingInput">Student Id</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <!-- <div style="text-align: left; padding: 16px 9px;">
                <a href="forgetpass.php">forget password</a>
            </div> -->
            



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
    
    if($conn){
        if(isset($_POST['login'])){
            $uid=$_POST['uid'];
            $password=$_POST['password'];
            if(empty($uid)){
                ?>
                    <script>
                        alert("uid cant be empty ");
                    </script>
                <?php

            }
            elseif(empty($password)){
                ?>
                    <script>
                        alert("password cant be empty ");
                    </script>
                <?php

            }


         
            

            else{
               
                $query="select first_name , sid ,email,department,semester, password from student_details where  sid = '$uid' and binary password= '$password'";
                $result=mysqli_query($conn,$query);
                $count=mysqli_num_rows($result);

                if($count>0){
                    while($row=mysqli_fetch_assoc($result)){
                        

                        session_start();
                        
                        $_SESSION["first_name"]=$row['first_name'];
                        $_SESSION["password"]=$row['password'];
                        $_SESSION["sid"]=$row['sid'];
                        $_SESSION["email"]=$row['email'];
                        $_SESSION["department"]=$row['department'];
                        $_SESSION['semester']=$row['semester'];
                       


                        
                        

                        // echo $_SESSION["name"];
                        // echo $_SESSION["password"];
                        // echo $_SESSION['sid'];
                        // echo $_SESSION["email"];
                        // echo $_SESSION['department'];
                        // die();

                        
                        
                       

                        // echo $_SESSION["email"];
                        // die();
                        
                        
                        

                        header("Location:student_dashboard.php");
                        
                    }

                }
                else{
                    ?>
                        <script>
                            alert("invalid id or password");
                        </script>
                    <?php
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










