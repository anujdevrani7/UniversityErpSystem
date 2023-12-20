<?php
    include "nav.php";
    
    ?>  
        <h1 align="center " style="margin: 28px 0px;">Mark Student Attendance </h1>
        <!-- <h5>Marking Attendance of subject name to be fetch with php</h5> -->
        <!-- table to show student details  -->


        <!-- select subject with respect to subject teacher  -->
        
        <div class="col-md-4" style="padding:0px 15px ;margin-bottom:20px;">
                    <label for="subject" class="form-label">Select Subject</label>
                    <select id="subject" name="subject" class="form-select">
                    <option selected>Choose</option>
                    <?php
                        $query="select subject_name , semester from subject where subjectteacher= '{$_SESSION['fid'] }'";
                        if($conn){
                            $result=mysqli_query($conn,$query);
                            while($row=mysqli_fetch_assoc($result)){
                                
                                
                                ?>
                                    <option  value="<?php echo $row['semester']." ".$row['subject_name']; ?>"><?php echo strtoupper($row['subject_name']); echo "  Semester  (" .$row['semester'].")"; ?></option>

                                <?php

                            }


                        }
                        

                    ?>
                    </select>
                    <label for="exampleInputPassword1" class="form-label">Select Date</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" required>

        </div>
        

        <div class="tbcontainer">
    
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>S no</th>
                        <th>Student Id</th>
                        <th>Student Name </th>
                        <th>Status</th>
                        
                    </tr>
                   <!-- start php code for marking attendance  -->


                </table>
            </div>
        </div>


        

    <?php
    

    ?>
        
        <div class="submit" style="display:flex; justify-content:center;">
                <button align="center" type="button" class="btn btn-primary" id="mark">Mark Attendance</button>
        </div>

        
        <!-- jquery code for mark attendacne  -->
        <script>
            $(document).ready(function () {
                // chat gpt code for date
                $("#exampleInputPassword1").change(function() {
                    var selectedDate = $(this).val();
                    var currentDate = new Date().toISOString().split('T')[0];

                    // If the selected date is greater than today, clear the input
                    if (selectedDate > currentDate) {
                        alert("Please select a date on or before today.");
                        $(this).val("");
                    }
                });
                
                // date code end
                var subname;
                
                $(".submit").hide();

                var x; //here x will be a string array for subject name and semester 
                $("#subject").change(function(){
                    subname=$(this).attr(' data.subjectname');
                    console.log(subname);
                    if($(this).val()!="Choose"){
                        x=$(this).val().split(" ");
                        
                        
                        $.ajax({
                            type: "POST",
                            url: "allformdata.php?att=1",
                            data: {sem:x[0]},
                            success: function (data) {
                                $(".table-responsive").html(data);
                                $(".submit").show();

                                
                            }
                        });
                    
                    
                        
                    }
                    else{
                        $(".table-responsive table , .submit").hide();
                    }
                    // in else part we can hide table also 
                })
                
                // code for mark attendance 

                $(".submit").click(function(){
                    var student=[];
                    var getstatus=[];
                    $(".ids").each(function(index){
                        student[index]=$(this).attr('data-sid');
                        console.log(student[index]);
                    })
                    $(".mark").each(function(index){
                        getstatus[index]=$(this).val();
                        console.log(getstatus[index]);

                    })
                    var current=$("#exampleInputPassword1").val();
                    // console.log(current);
                    // ajax code to store attendance in to the database 
                    $.ajax({
                        type: "POST",
                        url: "allformdata.php?store=1",
                        data: {ids: student , status:getstatus,sem:x[0],subject_name:x[1],date:current},
                       
                        success: function (data) {
                            $("body").html(data);
                        }
                    });
                })


            });
        </script>
    <?php
    include "footer.php";
?>


<!-- $('#exampleInputPassword1').on('input', function () {
                    var selectedDate = $(this).val();

                    // Get the current date in the format YYYY-MM-DD
                    var today = new Date().toISOString().split('T')[0];

                    // If the selected date is greater than today, set the value to today
                    if (selectedDate > today) {
                    $(this).val(today);
                    }
                });

                $('#exampleInputPassword1').on('click', function () {
                        // Open the date picker when the input is clicked
                        $(this).attr('type', 'date');
                    });

                    // Disable keyboard input for the date input
                    $('#exampleInputPassword1').on('keydown', function (e) {
                        e.preventDefault();
                    });

                    // Close the date picker when the user clicks outside of it
                    $(document).on('click', function (e) {
                        if (!$(e.target).closest('#exampleInputPassword1').length) {
                        $('#exampleInputPassword1').attr('type', 'text');
                        }
                    }); -->