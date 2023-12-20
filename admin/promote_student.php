<?php
include "connect_db.php";
include "nav_bar_code.php";
?>
    <style>
        select{
            margin: 12px;
            width: 400px !important;
        }

    </style>
    <label for="subject" class="form-label "style="margin-left:15px;">Select Course</label>
    <select id="subject" name="subject" class="form-select">
    <option value="Choose">Choose</option>
        <?php
            $query="SELECT * FROM `department` ";
            $res=mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($res)){
                ?>
                    <option value="<?php echo $row['c_name'] ?>"><?php echo $row['c_name'] ?></option>

                <?php
            }
        ?>
       
    </select>
    <label for="sem" class="form-label "style="margin-left:15px;">Select Semester</label>
    <select id="sem" name="semester" class="form-select">
    <script>
        $(document).ready(function () {
            $("#subject").change(function () { 
                if($(this).val()!='Choose'){
                    $.ajax({
                        type: "POST",
                        url: "add_fac.php?c=1",
                        data: { course:$(this).val() },
                        success: function (response) {
                            $("#sem").html(response);
                            
                        }
                    });
                }
                
                
            });
        });
    </script>

    </select>
    <button id="btnn" class="btn btn-outline-success " style="margin-left:12px; margin-bottom:12px; background-color:black; border:2px solid balck !important;">Success</button>
    <div class="tbcontainer">

    
            <div class="table-responsive">
                <table class="table">
                </table>
                
            </div>
        </div>

    <script>
        $(document).ready(function () {
            $("#btnn").click(function(){
                // alert("button is working ");
                if($("#sem").val()!=null){
                    var course=$("#subject").val();
                    $.ajax({
                        type: "POST",
                        url: "add_fac.php?promote=1",
                        data: { dep:course,sem : $("#sem").val() },
                        
                        success: function (response) {
                            $(".table").html(response);
                            
                        }
                    });
                    
                }
                
            })
            
            
            
        });
        
    </script>
<?php


include "footer_code.php";

?>

                