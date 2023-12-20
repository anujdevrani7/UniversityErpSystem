<?php
    include "connect_db.php";
    include "sesson_check.php";
    if(isset($_GET['fid'])){
        $fid=$_GET['fid'];
        $query="DELETE FROM faculty_details WHERE fid='$fid'";
        $res=mysqli_query($conn,$query);
        if($res){

            ?>
                <script>alert("record deleted successfully ");window.location.href="remove_faculty.php";</script>


            <?php
        }
    }
    if(isset($_GET['sid'])){
        $sid=$_GET['sid'];
        $query="DELETE FROM student_details WHERE sid='$sid'";
        
        $res=mysqli_query($conn,$query);
        if($res){

            ?>
                <script>alert("record deleted successfully ");window.location.href="remove_student.php";</script>


            <?php
        }
    }

    
    
?>