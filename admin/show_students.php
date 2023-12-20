<?php
    include "connect_db.php";
    include "nav_bar_code.php";
    

?>


<h1 align="center" class="student_reg_hed">Students Detail </h1>

<!-- show faculty main body start  -->
<div class="searchbydepartment">
    <div class="col-md-4">
    <label for="department" class="form-label">Select Department</label>
    <select id="department" name="department" class="form-select">
        <option selected>Choose...</option>
        <?php
            $query="select c_name from department";
            if($conn){
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result)){
                    // echo "inside the loop";
                    ?>
                    <option value="<?php echo $row['c_name']; ?>"><?php echo $row['c_name']; ?></option>
                    <?php
                }

            }
                                
        ?>
    </select>
</div>
    
</div>



<div class="tbcontainer">
    
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>SID</th>
                <th>Department</th>
                <th>Mobile</th>
                <th>Email</th>
                <!-- <th>Full Details</th> -->
            </tr>
            <?php
                $query="SELECT * FROM `student_details`";
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td><?php echo $row['first_name'];   ?></th>
                            <td><?php echo $row['sid'];   ?></th>
                            <td><?php echo $row['department'];   ?></th>
                            <td><?php echo $row['phone'];   ?></th>
                            <td><?php echo $row['email'];   ?></th>
                            <!-- <td ><a href=<?php echo "full_student_detail.php?sid={$row['sid']}"; ?>><button type="button"  class="btn btn-outline-info">Show</button> </a></td> -->
                        </tr>
                    <?php

                }

            ?>

            
            

        </table>
        
    </div>
</div>
<script>
    $(document).ready(function () {
        // alert("script is working ");        
        $(".searchbydepartment").change(function (e) { 
            var x=$("#department").val();
            // console.log(x);
            $.ajax({
                type: "POST",
                url: "add_fac.php?showfac=1",
                data: {dep:x},
                
                success: function (data) {
                    $(".table-responsive").html(data);
                    
                }
            });
            
        });    
    });
</script>


<?php
    include "footer_code.php";
?>