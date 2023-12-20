<?php
    include "nav_code.php";
    ?>
        <h1 align="center" style="margin-bottom:20px;margin-top:20px;">Attandance Regester</h1>
        <div class="tbcontainer">
    
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Subject </th>
                        <th>Subject Teacher</th>
                        <th>Delivered Lecture</th>
                        <th>Attentended Lecture</th>
                        <th>Full Details</th>
                        
                    </tr>
                    <!-- php code for generating attandance regester -->
                    
                    <?php
                    $query="SELECT * FROM subject WHERE course_name='{$_SESSION["department"]}' AND semester='{$_SESSION['semester']}'";
                    $result=mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row['subject_name']; ?>
                                    </td>
                                    <td>
                                        <!-- code for getting subject teacher name  -->
                                        <?php
                                            $fid=$row['subjectteacher'];
                                            $quer="SELECT name FROM `faculty_details` WHERE fid='$fid'";
                                            
                                            $re=mysqli_query($conn,$quer);
                                            while($roww=mysqli_fetch_assoc($re)){
                                                echo $roww['name'];
                                            }

                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['total_lecture_count']; ?>
                                    </td>
                                    <td>
                                        <!-- code for counting obtained lecture   -->
                                        <?php
                                            $que="SELECT sid FROM `attandence_detail` WHERE sid='{$_SESSION["sid"]}' AND status='present' and subject_name='{$row['subject_name']}'";
                                            // echo $que;
                                            
                                            echo mysqli_num_rows(mysqli_query($conn,$que));


                                        ?>
                                    </td>
                                    <td ><a href=<?php echo "full_att_detail.php?subject={$row['subject_name']}"; ?>><button type="button"  class="btn btn-outline-info">Show</button> </a></td>
                                </tr>
                            <?php
                        }
                    }
                    


                    ?>


                </table>
            </div>
        </div>
    <?php
    include "footer_code.php";
?>