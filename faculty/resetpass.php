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
                <input type="password" name="old" class="form-control" id="floatingInput" placeholder="New Password">
                <label for="floatingInput">New Password</label>
            </div>
            <div class="form-floating mb-3 ">
                <input type="password" name="new" class="form-control" id="floatingInput" placeholder="Confirm New Password">
                <label for="floatingInput">Confirm New Password</label>
            </div>
            
            



            <!-- new buttons -->
            <div class="d-grid gap-2">
                
                <button class="btn btn-primary" type="submit" name="login">Change Password</button>
            </div>
        </form>
    </div>
    
</body>
</html>
<?php
    $uid=$_GET['fid'];
    include "../admin/connect_db.php";
    if($conn){

        if(isset($_POST['login'])){
            
            $old=$_POST['old'];
            $new=$_POST['new'];
            if($old==$new){
                $query="update faculty_details set password = '$old' where fid='$uid'";
                if(mysqli_query($conn,$query)){
                    ?>
                        <script>
                            alert("password updated ");
                        </script>
                    <?php

                }

            }
            else{
                ?>
                    <script>
                        alert("password are not mtching not matching ")
                    </script>
                <?php
            }
            
    

        }

    }
    else{
        echo "data base is not connected ";
    }
?>

