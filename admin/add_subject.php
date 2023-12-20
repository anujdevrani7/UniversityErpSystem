<?php
    include "nav_bar_code.php";
    include "connect_db.php";
    // main content start
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
        <h1 align ="center">Add Subject</h1>
            <form action="add_fac.php" method="POST" style="width: 334px;">

                    <!-- for course name  -->
                    
                    <div class="mb-3">
                        <label for="subname" class="form-label">Subject  Name </label>
                        <input type="text" class="form-control hiddenafter" name="sname" id="subname" placeholder="ex cpp,java ..">
                    </div>
            
                    <label for="departmentt">Choose Course </label>
                    <select id="departmentt" name="department" class="form-select hiddenafter" style="height: 57px;">
                    <option selected value="">Choose...</option>
                    <?php
                        $query="select c_name from department";
                        if($conn){
                            $result=mysqli_query($conn,$query);
                            while($row=mysqli_fetch_assoc($result)){
                                
                                ?>
                                    <option value="<?php echo $row['c_name']; ?>"><?php echo $row['c_name']; ?></option>

                                <?php

                            }


                        }
                        

                    ?>
                    </select>

                   
                    
                    
                    
                    
                        <!-- <button type="button" class="btn btn-primary" id="proceed">Proceed </button><br> -->






                    <div class="hidden">
                    
                 




                <!-- new buttons -->
                        <!-- <div class="d-grid gap-2">
                            
                            <button class="btn btn-primary" type="submit" name="">Proceed</button>
                        </div> -->
                    </div>
            </form>
                
        </div>
    <?php

    ?>
        <script>
            $(document).ready(function () {
                // $(".hidden").hide();
                $("#departmentt").change(function(){
                    // $(".hidden").show();
                    // $(".hidden").slideDown("slow");
                    var department=$("#departmentt").val();
                    var subname=$("#subname").val();
                    // console.log(department);
                    // console.log(subname);
                    
                    $.ajax({
                        type: "POST",
                        url: "add_fac.php?addsub",
                        data: {depart:department , subj:subname},
                        success: function (data) {
                            // $(".hiddenafter").attr("readonly","readonly");
                            
                            // $("#proceed").hide();
                            $(".hidden").html(data);
                            $(".hidden").show();
                            
                        }
                    });
                })

            });
        </script>
    <?php
  


    // footer start
    include "footer_code.php";




    
    
    

?>