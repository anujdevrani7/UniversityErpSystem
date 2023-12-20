<?php
    include "sesson_check.php";
    include "changeversion.php";
    include "connect_db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/admin_css.css ?<?php $version ?>">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-black bg-gradient  navdim ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">UNIVERSITY ERP SYSTEM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">

                            <a class="nav-link active" aria-current="page" href="admin_drashboard.php"  >Home</a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                ADD
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="add_student.php"  >ADD STUDENTS</a></li>
                                <li><a class="dropdown-item" href="add_faculty.php"  >ADD fACULTY</a></li>
                                <li><a class="dropdown-item" href="promote_student.php"  >PROMOTE STUDENTS</a></li>


                            </ul>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                SHOW
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="show_students.php"  >SHOW STUDENTS</a></li>
                                <li><a class="dropdown-item" href="show_faculty.php"  >SHOW fACULTY</a></li>


                            </ul>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                REMOVE
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="remove_student.php"  >REMOVE STUDENTS</a></li>
                                <li><a class="dropdown-item" href="remove_faculty.php"  >REMOVE fACULTY</a></li>


                            </ul>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                SUBJECT
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="add_subject.php"  >ADD SUBJECT</a></li>
                                <!-- <li><a class="dropdown-item" href="remove_subject.php"  >REMOVE SUBJECT</a></li> -->


                            </ul>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                COURSE
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="add_course.php"  >ADD COURSE</a></li>
                                <li><a class="dropdown-item" href="remove_course.php"  >REMOVE COURSE</a></li>


                            </ul>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sendmail.php">SEND MAIL</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">LOGOUT</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>



        <h1 align="center">Admin Drashboard</h1>
        <!-- this section is for admin content box -->
        <div class="info-box">

        <!-- code for fetching image from database  -->
        <?php
            $query="select image from admin where id={$_SESSION['uid']}";
            $result=mysqli_query($conn,$query);
            $row=mysqli_fetch_assoc($result);
            $image=$row['image'];
            
            

        ?>
            <div class="admin-img"><img src=" <?php echo "$image"; ?>" height="200px"width="150px" alt="invalid link"><br><?php echo  strtoupper($_SESSION["name"]); ?></div>
            <div class="admin-detail">

                <!-- code for fetching data form database -->
                <?php
                    $query="select * from admin where id={$_SESSION['uid']}";
                    $result=mysqli_query($conn,$query);
                    $row=mysqli_fetch_assoc($result);
                    $email=$row['email'];
                    $fname=$row['f_name'];
                    $address=$row['address'];
                    $mobile=$row['mobile'];
                    // echo $email;echo "<br>";
                    // echo $fname;echo "<br>";
                    // echo $address;echo "<br>";
                    // echo $mobile;echo "<br>";
                    


                ?>

                <table border ="2 " cellpadding="10">
                    <tr>
                        <td>Admin Id</td>
                        <td><?php echo $_SESSION["uid"] ?></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $_SESSION["name"] ?></td>
                    </tr>
                    <tr>
                        <td>Email </td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td> <?php echo $mobile; ?></td>
                    </tr>
                    <tr>
                        <td>Father name</td>
                        <td><?php echo $fname; ?></td>
                    </tr>
    
                    
                    <tr>
                        <td>Address</td>
                        <td><?php echo $address; ?></td>
                    </tr>
    
                </table>

            </div>
            
            


        </div>
        <!-- strating footer code -->
        <div class="footer navbar-dark bg-black bg-gradient  ">
            <p><B>UNIVERSITY ERP SYSTEM</B> all rights reserved , managed by team <a href="#">Anuj</a></p>
        </div>
        <!-- footer end -->
        




        

        <!-- closing main container -->
    </div>
    
   
        
    
    
</body>

</html>