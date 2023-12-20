<?php
    include "connect_db.php";
    include "nav_bar_code.php";
?>
<h1 align="center">Full Student Details</h1>

<div class="info-box">
    <!-- code for fetchhing the images and variables  -->
            <?php
                $sid=$_GET['sid'];
                // echo $fid;
                // die();


                $query="select * from student_details where sid='$sid'";
                // echo $query;
                // die();
                $result=mysqli_query($conn,$query);
                $row=mysqli_fetch_assoc($result);
                $name=$row['first_name'];
                $dob=$row['dob'];
                $gender=$row['gender'];
                $email=$row['email'];
                $mobile=$row['phone'];
                $fname=$row['father_name'];
                $department=$row['department'];
                $semester=$row['semester'];
                $address=$row['address'];
                $pin=$row['pin'];
                $city=$row['city'];
                $image=$row['image'];
                
            ?>

            
            <div class="admin-img"><img src="<?php echo $image; ?>" height="200px"width="150px" alt="invalid link"><?php echo strtoupper($name) ;?></div>
            <div class="admin-detail">
                <table border="2"  cellpadding="">
                    <tr class="table_row">
                        <td>Student id </td>
                        <td><?php echo "$sid"; ?></td>
                    </tr>
                    
                    <tr class="table_row">
                        <td>Name</td>
                        <td><?php echo "$name"; ?></td>
                    </tr>
                    <tr class="table_row">
                        <td>Date of Bith </td>
                        <td><?php echo "$dob"; ?></td>
                    </tr>
                    <tr class="table_row">
                        <td>Gender</td>
                        <td><?php echo "$gender"; ?></td>
                    </tr>
    
                    <tr class="table_row">
                        <td>Email</td>
                        <td><?php echo  $email; ?></td>
                    </tr>
                    <tr class="table_row">
                        <td>Mobile</td>
                        <td><?php echo "$mobile"; ?></td>
                    </tr>
                    <tr class="table_row">
                        <td>Department</td>
                        <td><?php echo "$department"; ?></td>
                    </tr>
                    <tr class="table_row">
                        <td>Age</td>
                        <td><?php echo "$semester"; ?></td>
                    </tr>
                    <tr class="table_row">
                        <td>Address</td>
                        <td><?php echo "$address"; ?></td>
                    </tr>
                    <tr class="table_row">
                        <td>City</td>
                        <td><?php echo "$city"; ?></td>
                    </tr>
                    <tr class="table_row">
                        <td>Pin</td>
                        <td><?php echo "$pin"; ?></td>
                    </tr>
    
                </table>

            </div>
            
            

        
        </div>
    

<?php
    include "footer_code.php";
?>