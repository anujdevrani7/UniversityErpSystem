<?php
include "connect_db.php";
include "nav_bar_code.php";

    ?>
        <style>
            .add_course{
                height:95vh;
                align-items:center;
                display:flex;
                justify-content:center;
                /* border:2px solid black; */
                flex-direction:column;
            }
            label{
                font-size:23px;
                /* font-weight:bold; */
                margin:10px 0px;

            }
            select{
                margin:10px 0px;
            }
        </style>
        
        <div class="add_course">
        <h1 align ="center">Remove Course</h1>
            <form action="add_fac.php" method="POST" style="width: 334px;">
            <div class="">
                    <label for="department">Select Course</label>
                    <select id="department" name="department" class="form-select">
                    <option selected value="">Choose...</option>
                    <?php
                        $query="select c_name from department";
                        if($conn){
                            $result=mysqli_query($conn,$query);
                            while($row=mysqli_fetch_assoc($result)){
                                echo "inside the loop";
                                ?>
                                    <option value="<?php echo $row['c_name']; ?>"><?php echo $row['c_name']; ?></option>

                                <?php

                            }


                        }
                        

                    ?>
                    </select>
                </div>
                



                <!-- new buttons -->
                <div class="d-grid gap-2">
                    
                    <button class="btn btn-primary" type="submit" name="remove_course">Remove Course</button>
                </div>
            </form>
                
        </div>
    <?php
   
    

include "footer_code.php"
?>