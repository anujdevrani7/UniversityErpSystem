<?php
    include "nav_code.php";
    if(isset($_GET['subject'])){
        $subject=$_GET['subject'];
        // echo $subject;
        ?>
            <h1 align="center" style="margin-bottom:20px;margin-top:20px; text-transform: capitalize;"><?php echo  $subject ?> Attandance Regester</h1>
            <div class="tbcontainer">
    
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                        
                            <th>Date</th>
                            <!-- <th>Lecture No</th> -->
                            <th>Status</th>
                            <!-- <th>Marked by</th> -->
                            
                        </tr>
                        <?php
                            $query="SELECT * FROM `attandence_detail` where sid='{$_SESSION['sid']}' and subject_name='$subject'";
                            
                            $result=mysqli_query($conn,$query);
                            if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    ?>
                                        <tr>
                                            <td><?php echo  $row['date'] ;?></td>
                                            <!-- <td><?php// echo  "lecture number"; ?></td> -->
                                            <td><?php echo  $row['status']; ?></td>
                                            <!-- <td><//?php echo   "marked by "; ?></td> -->
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                       

                        
                        
                        


                    </table>
                </div>
            </div>

        <?php
        
    }

    include "footer_code.php";
    // include "sesson.php";
    // include "../admin/connect_db.php";

    
?>