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
        </style>
        
        <div class="add_course">
        <h1 align ="center">Add Course</h1>
            <form action="add_fac.php" method="POST" style="width: 334px;">
                <div class="form-floating mb-3 ">
                    <input type="text" name="cname" class="form-control" id="floatingInput" placeholder="Course Name">
                    <label for="floatingInput">Course Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" name="fee" class="form-control" id="floatingPassword" placeholder="Set Course Fee">
                    <label for="floatingPassword">Set Course Fee</label>
                </div>
                <!-- TOTAL NUMBERS OF SEMESTER  -->
                <div class="form-floating mb-3">
                    <input type="number" name="sem" class="form-control" id="floatingPassword" placeholder="Total Number Of Semester">
                    <label for="floatingPassword">Total Number Of Semester</label>
                </div>
                



                <!-- new buttons -->
                <div class="d-grid gap-2">
                    
                    <button class="btn btn-primary" type="submit" name="add_course">Add Course</button>
                </div>
            </form>
                
        </div>
    <?php
   
    

include "footer_code.php"
?>