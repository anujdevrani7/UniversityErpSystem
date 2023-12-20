<?php
    include "nav_code.php";
    
    
    ?>
        <style>
            select{
                margin: 12px;
                width: 62px !important;
            }

        </style>
        <h1 align="center" style="margin-bottom:20px;margin-top:20px;">Marks </h1>
        <label for="subject" class="form-label "style="margin-left:15px;">Select Semester</label>
        <select id="subject" name="subject" class="form-select">
                    <?php
                        $query="SELECT semester FROM student_details WHERE sid='{$_SESSION['sid']}'";
                        $res=mysqli_query($conn,$query);
                        $currsem=0;

                        while($row=mysqli_fetch_assoc($res)){
                            $currsem=$row['semester'];


                        }
                        for($i=$currsem;$i>0;$i--){
                            ?>
                                <option value="<?php echo $i ;?>"><?php echo $i ; ?></option>
                            <?php

                        }
                    ?>
                    
        </select>
        <div class="tbcontainer">

    
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Subject </th>
                        <th>Test</th>
                        <th>Total Marks</th>
                        <th>Obtained Marks</th>
                        <th>Percentage</th>
                        
                    </tr>
                    <!-- php code for generating attandance regester -->
                    
                    <?php
                    $query="SELECT * FROM `marks` WHERE sid='{$_SESSION['sid']}'";
                    
                    $result=mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <td><?php echo $row['subject'] ;?></td>
                                    <td><?php echo $row['test_type']; ?></td>
                                    <td><?php echo $row['totalmarks']; ?></td>
                                    <td><?php echo $row['obtained_marks']; ?></td>
                                    
                                    <td>
                                        <?php
                                            $total_marks=$row['totalmarks'];
                                            $obtained_marks=$row['obtained_marks'];
                                            
                                            
                                            $percentage=($obtained_marks/$total_marks)*100;

                                            echo $percentage."\t%";

                                        ?>
                                    </td>

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