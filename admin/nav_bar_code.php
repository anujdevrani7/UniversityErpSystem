<?php
    include "sesson_check.php";
    include "changeversion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
        <!-- user jq script link  -->
        <script src="../script.js"></script>
        

    <!-- google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Recursive&display=swap" rel="stylesheet">
    <!-- user csss link -->
    <link rel="stylesheet" href="../css/admin_css.css ?<?php $version ?>">
    <script type="text/javascript" src="../script.js"></script>
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
        

        