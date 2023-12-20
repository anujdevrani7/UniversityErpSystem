

<?php
    
    // php mailer files 
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);


 
    // this is for attendance from 
    include "sesson.php";
    include "../admin/connect_db.php";

    if(isset($_GET['att'])==1){
        $semester=$_POST['sem'];
        

        ?>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>S no</th>
                        <th>Student Id</th>
                        <th>Student Name </th>
                        <th>Status</th>
                        
                    </tr>
                   <!-- start php code for marking attendance  -->
                   <!-- first we need to create stuedent table to do that  -->
                   <?php
                        
                        $query="select * from student_details where department = '{$_SESSION['department'] }' and semester='$semester'";
                        // echo $query;
                        $result=mysqli_query($conn,$query);
                        if(mysqli_num_rows($result)>0){
                            $count=1;
                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td><?php echo $count; ?> </td>
                                        <?php
                                            // for incrementing serial numbers of the students 
                                            $count=$count+1;

                                        ?>
                                        <!-- change to original id  -->
                                        <td class="ids" data-sid='<?php echo $row['sid'] ?>'> <?php  echo $row['sid'] ?></td>
                                        <td> <?php echo $row['first_name'] ?> </td>
                                        <!-- selection tag for marking student attendance  -->
                                        <td class="status">
                                        
                                            <select class="mark" style="width: 102px;"  class="form-select">
                                            <option value="absent">absent</option>
                                            <option value="present">present</option>
                                            
                                            </select>

                                        </td>
                                    </tr>
                                
                            
                                <?php

                            }
                            

                        }
                            

                        
                       
                   ?>


                </table>
            </div>
            
        <?php

    }
    
    // mark attendacne

    if(isset($_GET['store'])==1){

        
        $status=$_POST['status'];
        $ids=$_POST['ids'];
        // echo date("d/m/y");
        
        $sem=$_POST['sem'];
        $subject_name=$_POST['subject_name'];
        $date=$_POST['date'];
        
        
        
        // echo $sem;
        $sql="SELECT department FROM student_details WHERE sid ='$ids[0]'";
        $result=mysqli_query($conn,$sql);

        $row=mysqli_fetch_assoc($result);
        $department=$row['department'];
        
        // $date=date("d/m/y");
        $flag=1;
        //write a query for  increasing lecture count 
        $query_for_increasing_lecture_count="SELECT total_lecture_count FROM subject WHERE subjectteacher='{$_SESSION["fid"]}' and semester='$sem' and subject_name='$subject_name'";
        $re=mysqli_query($conn,$query_for_increasing_lecture_count);
        while($row=mysqli_fetch_assoc($re)){
            $count=$row['total_lecture_count'];
            $count=$count+1;
            $query_for_update_count="UPDATE subject SET total_lecture_count= $count WHERE subjectteacher='{$_SESSION["fid"]}' and semester='$sem' and subject_name='$subject_name'";
            mysqli_query($conn,$query_for_update_count);
        }
        $data=array_combine($ids,$status);
        
        foreach($data as $key=>$value){
            $query="INSERT INTO attandence_detail (sid,department,semester,date,status,subject_name)VALUES('$key','$department','$sem','$date','$value','$subject_name')";
           
            if(mysqli_query($conn,$query)){
                $flag=0;
            }

            
        }
        
        if($flag==0){
            ?>
                    <script>
                        alert("marked");
                        window.location.href="markattandance.php";

                    </script>
                <?php
        }
        else{
            ?>
                    <script>
                        alert("notmarked");
                        window.location.href="markattandance.php";

                    </script>
            <?php

        }

    
    
    
    
    }

    // code for upload marks 
    if(isset($_GET['uploadmarks'])==1){
        
            $semester=$_POST['sem'];
            $totalmarks=$_POST['totalmarks'];

            
        

        ?>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>S no</th>
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Total Marks</th>
                        <th>Obtained Marks</th>
                        
                    </tr>
                   <!-- start php code for marking attendance  -->
                   <!-- first we need to create stuedent table to do that  -->
                   <?php
                        
                        $query="select * from student_details where department = '{$_SESSION['department'] }' and semester='$semester'";
                        // echo $query;
                        $result=mysqli_query($conn,$query);
                        if(mysqli_num_rows($result)>0){
                            $count=1;
                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td><?php echo $count; ?> </td>
                                        <?php
                                            // for incrementing serial numbers of the students 
                                            $count=$count+1;

                                        ?>
                                        <td class="sid" data-id=<?php echo $row['sid'] ?>> <?php echo $row['sid'] ?> </td>
                                        <td><?php echo $row['first_name'] ?> </td>
                                        <td><?php echo $totalmarks ?> </td>
                                        <td> <input  class="obtained_marks" type="number"></td>
                                    </tr>
                                
                            
                                <?php

                            }
                            

                        }
                            

                        
                       
                   ?>


                </table>
            </div>
            
        <?php

        
        
        
    }
    if(isset($_GET['upload_mark'])){
       $total_mark= $_POST['total_mark'];
       $obtained_marks= $_POST['obtained_marks'];
       $semester= $_POST['sem'];

       $sids= $_POST['sids'];
       $subject= $_POST['subject'];
       $test_type=$_POST['testtype'];
    //    echo $total_mark."<br>";
    //    echo $semester."<br>";
    //    echo $subject."<br>";
    //    echo "<br>";
    //    print_r($obtained_marks);
    //    echo "<br>";
    //    print_r($sids);

    $data=array_combine($sids,$obtained_marks);
    $flag=1;
    foreach($data as $id => $value){
        
        $query = "INSERT INTO marks (sid,subject,totalmarks,obtained_marks,semester,test_type)VALUES('$id','$subject','$total_mark','$value','$semester','$test_type') ";
        if(mysqli_query($conn,$query)){
            $flag=0;

        }
        else{
            $flag=1;
            break;
        }
    }
    if($flag==0){
        ?>
            <script >
                alert("uploaded successfully");
                window.location.href="uploadmarks.php";
            </script>
        <?php

    }

        
    }



    // sending mail code 

    if(isset($_POST['msub'])){
  
        $subject=$_POST['id'];
        $mailbody=$_POST['mailbodyy'];
      
        $pass=$_POST['pass'];
        $tempname=$_FILES['img']['tmp_name'];
        
       
        if(empty($pass)){
            ?>
                <script>
                    alert("please enter password ");
                    window.location.href='sentmail.php';
                </script>
            <?php
            
        }
   
        // attachmets missing 
        // =$_POST[''];
        // =$_POST[''];
        $toemail=array();
       
        if(isset($_POST['students_detail'])){
            $query="SELECT email FROM student_details WHERE email!='' && department = '{$_SESSION["department"]}'";
            $result=mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($result)){
                array_push($toemail,$row['email']);
                
            }
        }
       
        if(isset($_POST['admin'])){
            $query="SELECT email FROM admin WHERE email!='' ";
            $result=mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($result)){
                array_push($toemail,$row['email']);
                
            }
            
        }
       
        if(isset($_POST['faculty_details'])){
            $query="SELECT email FROM faculty_details WHERE email!='' && email !='{$_SESSION["email"]}' && department = '{$_SESSION["department"]}'";
            
            $result=mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($result)){
                array_push($toemail,$row['email']);
                
            }
        }
        // print_r($toemail);
        try {





            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;   
            //Enable verbose debug output


            

            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $_SESSION['email'];                    //SMTP username
            $mail->Password   = $pass;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($_SESSION['email'], $_SESSION['name']);
            foreach($toemail as $mids){
                $mail->addAddress($mids);     //Add a recipient
            
            }
            //Attachments
            
            //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $mailbody;

                $file_type = mime_content_type($tempname);
                $mail->addAttachment($tempname,'atttachment','base64',$file_type);
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
            


            // echo 'Message has been sent';
            // header("Location:verificationphase.php");
            
            


        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        ?>
                <script>
                    alert("Mail send ");
                    window.location.href='sentmail.php';
                </script>
        <?php
        
    }




    // code for uploading resources by the  faculty 

    if(isset($_POST['uplodResources'])){
        // $f=fopen("../studymaterial/note.txt","a");
        // if(fwrite($f,$_POST['lesson_content'])){
        //     echo "data entered successfully ";
        // }
        // else{
        //     echo "data is not entered ";
        // }


        // $tsubject=;
        // print_r($tsubject);
        
        $array = explode(" ",$_POST['subject']);
        // print_r($array);
        // die();
        $course=$_SESSION["department"];
        $semester=$array[0];
        $subject=$array[1];
    
        $lesson_name=$_POST['lesson_name'];
        $lesson_content=$_POST['lesson_content'];
        $link=$_POST['link'];
        // $file=$_POST['file'];

        $folder_path=("../studymaterial/".$lesson_name.$subject.$course.".txt");
        $folder_path=str_replace(' ', '', $folder_path);
        
        // echo $folder_path;
        
        




        $query="INSERT INTO resources (subject_name,course,semester,lesson_name,embed_link,lesson_content) VALUES('$subject','$course','$semester','$lesson_name','$link','$folder_path')";

        if(mysqli_query($conn,$query)){
        
            $f=fopen($folder_path,"a");
            if(fwrite($f,$lesson_content)){

                // echo "entered successfully ";
                ?>
                    <script>
                        alert("uploaded ");
                        window.location.href="uploadresources.php";
                    </script>
                <?php
            }
            else{
                echo "not entered ";
            }
        }
        

        
    }



        
        

        
    

?>