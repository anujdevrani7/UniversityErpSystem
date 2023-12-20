<?php
    include "nav.php";
    ?>
        <style>
            .totalmarks{
                width: 210px;
                height: auto;
                /* border: 2px solid; */
                margin-left: 16px;
            }
        </style>
        <h1 align="center">Upload Students Marks </h1>
        <!-- select subject with respect to subject teacher   -->
        
        


        <!-- total marks  -->
        <div class="re">

        </div>
       
        <div class="totalmarks">
            <div class="form-floating mb-3 ">
                    <input type="text"id="test_type" name="type"  class="form-control" id="floatingInput" placeholder="type">
                    <label for="floatingInput">Test Type</label>
            </div>
            <div class="form-floating mb-3 ">
                    <input type="number"  name="mark" id="total" class="form-control" id="floatingInput" placeholder="total mark" required>
                    <label for="floatingInput">Total Marks</label>
            </div>

        </div>
        <div class="submit" style="display:flex; justify-content:center;">
                <button align="center" type="button" class="btn btn-primary" id="mark">select student </button>
        </div>

        <!-- for selecting students   -->
        <div id ="sutdent_list"class="col-md-4" style="padding:0px 15px ;margin-bottom:20px;">
                    <label for="subject" class="form-label">Select Subject</label>
                    <select id="subject" name="subject" class="form-select">
                    <option selected>Choose</option>
                    <?php
                        $query="select subject_name , semester from subject where subjectteacher= '{$_SESSION['fid'] }'";
                        if($conn){
                            $result=mysqli_query($conn,$query);
                            while($row=mysqli_fetch_assoc($result)){
                                
                                
                                ?>
                                    <option value="<?php echo $row['semester']." ".$row['subject_name']; ?>"><?php echo strtoupper($row['subject_name']); echo "  Semester  (" .$row['semester'].")"; ?></option>

                                <?php

                            }


                        }
                        

                    ?>
                    </select>
        </div>
        <!-- table for entering marks  -->

        <div class="tbcontainer">
    
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>S no</th>
                        <th>Student Id</th>
                        <th>Student Name </th>
                        <th>Total Marks</th>
                        <th>Obtaine Marks</th>
                        
                    </tr>
                  


                </table>
                
            </div>
            
        </div>
        <h6 align="center"><button type="button" class="btn btn-primary uploadmark">Upload Marks</button></h6>

        <script>
            $(document).ready(function () {
                var total;
                var testtype;
               
                $(".uploadmark").hide();
                
                var x;//here x will be a array of subject name and semester
                $(".table").hide();
                $("#sutdent_list").hide();
                $("#mark").click(function(){
                    testtype=$("#test_type").val();
                    $(this).hide();
                    
                    if(parseInt($("#total").val())>0){
                        $("#test_type,#total").attr("disabled","disabled");
                        $("#sutdent_list").show();
                    }
                })
                
                


                //

                $("#subject").change(function (e) { 
                    if($("#subject").val()!="Choose"){
                        $(".table").show();
                        x=$("#subject").val().split(" ");
                        total=parseInt($("#total").val());
                        
                        $.ajax({
                            type: "POST",
                            url: "allformdata.php?uploadmarks=1",
                            data: {sem : x[0],totalmarks : total},
                            
                            success: function (data) {
                                $(".table-responsive").html(data);
                                $(".uploadmark").show();
                                
                                
                            }
                        });
                    }
                    else{
                        $(".table").hide();
                        
                    }
                    
                    
                });
                $(".uploadmark").click(function(){
                    var flag=0;
                    var sid=[];
                    var obtained_marks=[] ;
                    $(".sid").each(function(index){
                        sid[index]=$(this).attr('data-id');
                        // console.log(sid[index]);

                    }) 
                    $(".obtained_marks").each(function(index){
                        var obtmark=parseInt(($(this).val()));
                        if(obtmark>=0){
                            if(obtmark<=total){
                               
                                $(this).css("background-color","white");
                            }
                            else{
                                $(this).css("background-color","red");
                                flag=1;
                            }
                        }
                        else{
                            $(this).css("background-color","red");
                            flag=1;

                        }
                    })
                    if(flag==0){
                        $(".obtained_marks").each(function(index){
                            obtained_marks[index]=$(this).val();
                            
                        })
                        $.ajax({
                            type: "POST",
                            url: "allformdata.php?upload_mark=1",
                            data: {total_mark : total ,obtained_marks :obtained_marks,sem : x[0],subject :x[1],sids : sid ,testtype:testtype },
                            success: function (data) {
                                $(".re").html(data);
                                
                            }
                        });


                    }
                    
                    
                })
                
            });
        </script>
    <?php
    
     

    include "footer.php";
?>