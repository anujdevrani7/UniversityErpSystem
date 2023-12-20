<?php
include "nav_code.php";


?>
    <div class="res_cont">
        <div class="col-md-4" style="padding:0px 15px ;margin-bottom:20px;">
            <!-- <label for="subject" class="form-label">Select Lesson</label> -->
            <select id="subject" name="subject" class="form-select">
                <option selected>Select Lesson</option>
                <?php
                $query="SELECT * FROM resources WHERE subject_name ='{$_GET['c_name']}' and course='{$_SESSION["department"]}' and semester='{$_SESSION['semester']}'";
                if($result=mysqli_query($conn,$query)){
                    if(mysqli_num_rows($result)>0){

                        while($row=mysqli_fetch_assoc($result)){
                            ?>
                                <option value="<?php echo $row['lesson_name'] ;?>"><?php echo $row['lesson_name'] ;?></option>
                            <?php

                        }
                    }
                    
                }
                
                            

            ?>
            </select>
        </div>
        <div class="result">

        </div>
    </div>
    <script>
        $(document).ready(function () {
            var sub="<?php echo $_GET['c_name'] ?>";
            console.log(sub);
            
            $("#subject").change(function () { 
                $.ajax({
                    type: "POST",
                    url: "allformdata.php?show_content="+sub,
                    data: {lesson:$(this).val()},
                    success: function (data) {
                        $(".result").html(data);
                        
                    }
                });
                
                
            });
        });
    </script>
<?php

include "footer_code.php";
?>




