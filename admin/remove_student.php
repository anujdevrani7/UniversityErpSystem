<?php
    
    
    include "nav_bar_code.php";
    function tableshow($query){
        ?>
            <div class="tbcontainer">
    
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>sid</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Delete Faculty</th>
                        </tr>
                        <?php
                            include "connect_db.php";
                            $result=mysqli_query($conn,$query);
                            if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['first_name']; ?> </td>
                                            <td><?php echo $row['sid']; ?> </td>
                                            <td><?php echo $row['department']; ?> </td>
                                            <td><?php echo $row['email']; ?> </td>
                                            <td><a href=<?php echo "deletefac.php?sid={$row['sid']}"; ?>><button type="button"  class="btn btn-outline-danger">Delete</button> </a></td>
                                        </tr>
                                    <?php
                                }

                            }
                            else{
                                echo "data does not exist ";
                            }
                            

                        ?>

                        
                        

                    </table>
                    
                </div>
            </div>
        <?php

        

    }
    
?>
    
    <h1 align="center" class="student_reg_hed">Remove Student </h1>
    <div class="data">

    </div>

    
    <form action="" method="POST" class="delfac">
        
        <div class="form-floating mb-3 delfacform">

            <input type="text" name="sid" class="form-control " id="floatingInput" placeholder="enter sid">
            <label for="floatingInput">Enter SID</label>        
            <button type="submit" name="delbutton" class="btn btn-primary btn-lg">Search</button>
            <button type="submit" name="showall" class="btn btn-primary btn-lg">Show All</button>

            <!-- this is delete by department  -->
            <!-- <label for="seacrchbydepartment" >Search By Department </label> -->
            <select name="" id="seacrchbydepartment">
                <option value="nothig">SEARCH BY DEPARTMENT </option>
            <?php
                include "connect_db.php";
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
            
            
            
        </div>
    </form>

    
   
   <!-- code for removing faculty by sid   -->
<?php
    if(isset($_POST['delbutton'])){
        // echo "delete button clicked ";
        $sid=$_POST['sid'];
        $query="select * from student_details where sid='$sid'";
        

        tableshow($query);
        
        
    }
    
    if(isset($_POST['showall']) || !isset($_POST['delbutton']) ){
        // echo "show all and delete button not clicked ";
        // tableshow(1,2,3);
        $query="select * from student_details";
        tableshow($query);
    }
?>
<script>
    $(document).ready(function () {

        
        


        $("#seacrchbydepartment").change(function (e) { 
            if($("#seacrchbydepartment").val()!='nothig'){
                var x= $(this).val();
                console.log(x)
                $.ajax({
                type: "POST",
                url: "add_fac.php?searchstu=1",
                data: {value : x},
                        
                success: function (data) {
                $(".tbcontainer").html(data);
                            
                    }
                });
            }
            
        });
        
    });
</script>
<?php
    include "footer_code.php";
?>