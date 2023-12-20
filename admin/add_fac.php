<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';



    include "connect_db.php";
    if(isset($_POST['submit'])){
        
        



        // echo "button clicked";
            $name=$_POST['name'];
            $dob=$_POST['dob'];
            $gender=$_POST['gender'];
            $age=$_POST['age'];
            $email=$_POST['email'];
            $department=$_POST['department'];
            $mobile=$_POST['mobile'];
            $fname=$_POST['fname'];
            $address=$_POST['address'];
            $city=$_POST['city'];
            $zip=$_POST['zip'];
            $password=$name.$name;
        if(empty($dob) && empty($gender)&& empty($age)&& empty($email)&& empty($department)&& empty($mobile)&& empty($fname)&& empty($address)){
                ?>
                    <script>alert("somethig is empty")</script>
                <?php
        }
        else{


            

            // echo $name;             echo "<br>";
            // echo $dob;echo "<br>";
            // echo $gender;echo "<br>";
            // echo $age;echo "<br>";
            // echo $email;echo "<br>";
            // echo $department;echo "<br>";
            // echo $mobile;echo "<br>";
            // echo $fname;echo "<br>";
            // echo $address;echo "<br>";
            // echo $city;echo "<br>";
            // echo $zip;echo "<br>";


            $query="INSERT INTO `faculty_details` ( `password`, `name`, `dob`, `gender`, `email`, `mobile`, `father_name`, `department`, `age`, `address`, `pin`, `city`, `image`) VALUES ( '$password', '$name', '$dob', '$gender', '$email', '$mobile', '$fname', '$department', '$age', '$address', '$zip', '$city', 'image path') ";
            mysqli_query($conn,$query);
            $sql="SELECT sno FROM faculty_details WHERE mobile='$mobile'";
            $result=mysqli_query($conn,$sql);
            $sno;
            while($row=mysqli_fetch_assoc($result)){

                $sno=$row['sno'];
            }
            // echo $sno;
            $fid="UES".$department."102".$sno;

            $sql3="UPDATE faculty_details SET fid='$fid' WHERE password='$password' AND mobile='$mobile'";
            mysqli_query($conn,$sql3);

            // code for inserting images into the images folder

            $file=$_FILES['img']['name'];
            $folder="../image/faculty_images/".$fid.".jpg";
            $temp_name=$_FILES["img"]["tmp_name"];
            // echo $folder."<br>";
            // echo $file;
            // echo $temp_name;
            move_uploaded_file($temp_name,$folder);
           
            
            
            $insimg="UPDATE faculty_details SET image='$folder' where fid='$fid'";
            mysqli_query($conn,$insimg);






            ?>
                <!-- please use sweet alert hear  -->
                <script>alert("added to database");window.location.href="add_faculty.php";</script>
            <?php



            }

           
        




    }




    // this code is for add course 

    if(isset($_POST['add_course'])){
        // echo "moved to destination page ";
        $c_name=$_POST['cname'];
        $fee=$_POST['fee'];
        $sem=$_POST['sem'];
        if(!empty($c_name && $fee)){
            $query="INSERT INTO department (c_name,c_fee,total_semester)VALUES('$c_name',$fee,$sem)";
            if(mysqli_query($conn,$query)){
                ?> <script>alert("data entere successfully ");window.location.href="add_course.php"; </script> <?php
            }

        }

        else{
            ?> <script>alert("course name or fee cant be empty ");window.location.href="add_course.php"; </script> <?php

        }
        
        
        
        
    }



    // this is for remove course 

    if(isset($_POST['remove_course'])){
        // echo "reched to destination ";
        $department=$_POST['department'];
        if(empty($department)){
            ?> <script>alert("invalid value ");window.location.href="add_course.php"; </script> <?php
        }
        $query="DELETE FROM department WHERE c_name='$department'";
        // echo $query;
        if(mysqli_query($conn,$query)){
            ?> <script>alert("removed successfully ");window.location.href="remove_course.php"; </script> <?php

        }
        else{
            echo "error ocurred";
        }
    }


    // this is for add subject code 

    if(isset($_GET['addsub'])){
        $department=$_POST['depart'];
        $subject=$_POST['subj'];
        $query="select fid , name  from faculty_details where department = '$department' ";
        $result=mysqli_query($conn,$query);
        ?>
            <label for="department">Choose Faculty </label>
                    <select id="department" name="fid" class="form-select" style="height: 57px;">
                    <!-- <option selected value="">Choose...</option> -->
                    <?php
                       
                        if($conn){
                            $result=mysqli_query($conn,$query);
                            while($row=mysqli_fetch_assoc($result)){
                                
                                ?>
                                    <option value="<?php echo $row['fid']; ?>"><?php echo $row['fid']. "  " .$row['name']; ?></option>

                                <?php

                            }
                            


                        }
                        

                    ?>
                    </select>


                    <!-- for total number of semester  -->
                    <label for="sem">Choose Semester </label>
                    <select id="sem" name="sem" class="form-select hiddenafter" style="height: 57px;">
                    
                    <?php
                        $sql="SELECT total_semester FROM department WHERE c_name='$department'";
                        if($result2=mysqli_query($conn,$sql)){
                            $row=mysqli_fetch_assoc($result2);
                            for($i=1;$i<=$row['total_semester'];$i++){
                                ?>
                                    <option value=<?php echo $i ?> > <?php echo $i ?></option>
                                <?php

                            }
                        }

                    ?>
                        
                    </select>


                    <div class="d-grid gap-2">
                            
                            <button class="btn btn-primary" type="submit" style="margin-bottom: 20px;" name="pro">Click To Add Subject </button>
                        </div>
                    </div>
        <?php

    }

    if(isset($_POST['pro'])){
        // echo "all woring properly ";
        // echo "<br>";
        
        // echo 
        // echo "<br>";
        // echo $_POST['sname'];
        $fid=$_POST['fid'];
        $department=$_POST['department'];
        $subject=$_POST['sname'];
        $sem=$_POST['sem'];
        
        $query="INSERT into subject (subject_name , course_name , subjectteacher,semester)values('$subject','$department','$fid','$sem')";
        $result=mysqli_query($conn,$query) ;
        //date 22-10
        // SELECT sub_id WHERE subject_name="" and fid="" and semester=""
        $query2="SELECT sub_id from subject WHERE subject_name='$subject' and subjectteacher='$fid' and semester='$sem'";
        
        $re=mysqli_query($conn,$query2);
        
        
        while($row=mysqli_fetch_assoc($re)){
            $tempvar=$row['sub_id'];
            $subject_id=$subject."".$tempvar;
            // $query3="UPDATE subject SET subject_id='$subject_id' WHERE sub_id= $row['sub_id']";
            $query3="UPDATE subject SET subject_id='$subject_id' where sub_id=$tempvar";
            mysqli_query($conn,$query3);

            
            
        }
        


        if($result){
            ?> <script>alert("Updated  successfully ");window.location.href="add_subject.php"; </script> <?php
            
        }       




       
    }
    



    if(isset($_GET['searchbydep'])){
        ?>
            <div class="tbcontainer">
        
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>FID</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Delete Faculty</th>
                    </tr>
                    <?php
                        include "connect_db.php";
                        $query="select * from faculty_details where department = '{$_POST['value']}'";
                        $result=mysqli_query($conn,$query);
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td><?php echo $row['name']; ?> </td>
                                        <td><?php echo $row['fid']; ?> </td>
                                        <td><?php echo $row['department']; ?> </td>
                                        <td><?php echo $row['email']; ?> </td>
                                        <td><a href=<?php echo "deletefac.php?fid={$row['fid']}"; ?>><button type="button"  class="btn btn-outline-danger">Delete</button> </a></td>
                                    </tr>
                                <?php
                            }

                        }
                        else{
                            echo "data does not exist ";
                        }
                        

                    ?>

                    
                    

                </table>
                
            </div>
        </div>


    <?php


    }
    if(isset($_GET['showfac'])==1){
        $department=$_POST['dep'];
        ?>
            <table class="table">
            <tr>
                <th>Name</th>
                <th>FID</th>
                <th>Department</th>
                <th>Mobile</th>
                <th>Email</th>
                <!-- <th>Full Details</th> -->
            </tr>
            <?php
                $query="select * from student_details where department= '$department' ";
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td><?php echo $row['first_name'];   ?></th>
                            <td><?php echo $row['sid'];   ?></th>
                            <td><?php echo $row['department'];   ?></th>
                            <td><?php echo $row['phone'];   ?></th>
                            <td><?php echo $row['email'];   ?></th>
                            <!-- <td ><a href=<?php echo "full_faculty_detail.php?fid={$row['sid']}"; ?>><button type="button"  class="btn btn-outline-info">Show</button> </a></td> -->
                        </tr>
                    <?php

                }

            ?>

            
            

        </table>
        <?php
    }


    if(isset($_POST['submit_student'])){

        // echo "button is clicked ";
        // die();
        
        $first_name=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $dob=$_POST['dob'];
        
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $department=$_POST['department'];
        $moblie=$_POST['mobile'];
        $fathername=$_POST['fname'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $pin=$_POST['zip'];
        
        // echo $first_name;
        // echo $lastname;
        // echo $dob;
        // // echo $image;
        // echo $gender;
        // echo $email;
        // echo $moblie;
        // echo $department;
        // echo $fathername;
        // echo $address;
        // echo $city;
        // echo $pin;
        
        
        
        
        $query="INSERT INTO student_details (first_name,last_name,dob,email,gender,address,pin,phone,father_name,department,semester,city,password)VALUES('$first_name','$lastname','$dob','$email','$gender','$address','$pin','$moblie','$fathername','$department','1','$city','$first_name$first_name')";
        if(mysqli_query($conn,$query)){
            $query="SELECT id FROM student_details WHERE phone ='$moblie'";
            if($result=mysqli_query($conn,$query)){
                $row=mysqli_fetch_assoc($result);
                $tempid=$row['id'];
                $sid='UES'.$department.'11'.$tempid;
                $q2="UPDATE student_details SET sid = '$sid' where id =$tempid";
                mysqli_query($conn,$q2);
                if(isset($_FILES['img'])){
                    
                    
                    if($_FILES['img']['size']>0){
                        $file=$_FILES['img']['name'];//insrted image name 
                        $folder="../image/students_images/".$sid.".jpg";
                        $temp_name=$_FILES["img"]["tmp_name"];
                        // echo $folder."<br>";
                        // echo $file;
                        // echo $temp_name;
                        move_uploaded_file($temp_name,$folder);
                        $finalquery="UPDATE student_details set image ='$folder' WHERE phone ='$moblie'";
                        mysqli_query($conn,$finalquery);
                        }
                    
                }
                ?>
                    <script>
                        alert("successful ");
                        window.location.href='add_student.php';

                    </script>
                <?php

            }
        }
        
       
        
            
        

    }   

    if(isset($_POST['msub'])){
        $subject=$_POST['subject'];
        $mailbody=$_POST['mailbody'];
        // $attach=$_FILES['img'];
        $tempname=$_FILES['img']['tmp_name'];
        // print_r($_FILES['img']);
        // die();
        
        
        
        $toemailids=array();

        if(isset($_POST['students_detail'])){
            $query="SELECT email FROM student_details WHERE email !=''";
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    array_push($toemailids,$row['email']);
                }
            }

        }
    
        if(isset($_POST['faculty_details'])){
            $query="SELECT email FROM faculty_details WHERE email!=''";
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    
                    array_push($toemailids,$row['email']);
                
                }
            }



        }
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
            foreach($toemailids as $mids){
                $mail->addAddress($mids);     //Add a recipient
            
            }
            //Attachments
            
            //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $mailbody;


                $file_type = mime_content_type($tempname);
                $mail->addAttachment($tempname,'atttachment','base64',$file_type);
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
            


            // echo 'Message has been sent';
            // header("Location:verificationphase.php");
            ?>
                <script>
                    alert("Mail send ");
                    window.location.href='sendmail.php';
                </script>
            <?php
            


        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
    }


    if(isset($_POST['course'])){
        $query="SELECT total_semester from department  WHERE c_name='{$_POST['course']}'";
       
        $res=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($res)){
            for($i=$row['total_semester']-1;$i>0;$i--){
                ?>

                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                
                <?php
                
            }
            

        }

    }
    if(isset($_GET['promote'])){
        $course=$_POST['dep'];
        $semester=$_POST['sem'];
        $query="SELECT * FROM `student_details` WHERE department='$course' AND semester='$semester'";
        $res=mysqli_query($conn,$query);
        if(mysqli_num_rows($res)>0){
            ?>
                
                <table class="table">
                    <tr class="sticky">
                        <th>Roll No</th>
                        <th>Name </th>
                        <th>Department</th>
                        <th>Semeseter</th>
                        
                        <th>Update</th>
                        
                    </tr>
                
            



                    <?php
                        while($row=mysqli_fetch_assoc($res)){
                           

                            
                            ?>
                                <tr>

                                
                                    <td ><?php echo $row['sid']; ?></td>
                                    <td><?php echo $row['first_name']; ?></td>
                                    <td><?php echo $row['department']; ?></td>
                                    <td><?php echo $row['semester']; ?></td>
                                    
                                    <th><button id="<?php echo $row['sid']; ?>"class="prbtn btn btn-primary" >Promote</button></th>
                                </tr>
                            <?php
                            }


                        
                    ?>
                </table>
                <script>
                    $(document).ready(function () {
                        $(".prbtn").click(function(){
                            var course="<?php echo $course ?>";
                            var sem ="<?php echo $semester ?>";
                            // alert("butto is clicked ");
                            // alert();

                            $.ajax({
                                type: "POST",
                                url: "add_fac.php",
                                data: {id:$(this).attr("id"),s:sem},
                                
                                success: function (response) {
                                    
                                    
                                }
                            });
                            $(this).text("Promoted");
                            $(this).removeAttr("id");
                        })
                    });
                </script>
            <?php

        }
        else{
            echo "no data found";
        }

    }
    if(isset($_POST['id'])){
        $sem=$_POST['s']+1;
        $query="UPDATE student_details SET semester='$sem' WHERE sid='{$_POST['id']}'";
        // echo $query;
        mysqli_query($conn,$query);
    }

   if(isset($_GET['searchstu'])){
        ?>
            <div class="tbcontainer">
        
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>SID</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Delete Faculty</th>
                </tr>
                <?php
                    include "connect_db.php";
                    $query="select * from student_details where department = '{$_POST['value']}'";
                    $result=mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <td><?php echo $row['first_name']; ?> </td>
                                    <td><?php echo $row['sid']; ?> </td>
                                    <td><?php echo $row['department']; ?> </td>
                                    <td><?php echo $row['email']; ?> </td>
                                    <td><a href=<?php echo "deletefac.php?sid={$row['sid']}"; ?>><button type="button"  class="btn btn-outline-danger">Delete</button> </a></td>
                                </tr>
                            <?php
                        }

                    }
                    else{
                        echo "data does not exist ";
                    }
                    

                ?>

                
                

            </table>
            
        </div>
    </div>
        <?php
   }

?>

