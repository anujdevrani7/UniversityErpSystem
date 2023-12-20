<?php
    include "nav_bar_code.php";
    ?>
        <style>
            select{
                margin: 12px;
                width: 200px !important;
            }

        </style>
        <label for="subject" class="form-label "style="margin-left:15px;">Select Semester</label>
        <select id="subject" name="subject" class="form-select">
                    <?php
                        $query="SELECT * from department";
                        echo $query;
                        $res=mysqli_query($conn,$query);
                        

                        while($row=mysqli_fetch_assoc($res)){
                            ?>
                                <option value=""><?php echo $row['c_name']; ?></option>
                            <?php
                            


                        }
                        
                    ?>
                    
        </select>
        
    <?php


    
    include "footer_code.php";
?>