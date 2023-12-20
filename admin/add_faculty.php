<?php
    include "nav_bar_code.php";
    include "connect_db.php";
    ?>
        <h1 align="center" class="student_reg_hed">Faculty Regestration Form</h1>
        <div class="add_student_form">

            <form class="row g-3" style="padding:0px 12px;"method="POST" action="add_fac.php" enctype="multipart/form-data">
                <!-- this is for name -->
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <!-- this for dob -->
                <div class="col-md-6">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" name="dob"id="dob">
                </div>

                <!-- insert image -->
                

                <div class="col-md-6 ">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">insert image</label>
                        <input class="form-control" name="img" type="file" id="formFile">
                    </div>
                </div>
                

                

                <!-- radio button for gender -->
                <div class="col-md-6">
                    Gender
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="female">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Female
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="male"  id="flexRadioDefault2" >
                        <label class="form-check-label" for="flexRadioDefault2">
                            Male
                        </label>
                    </div>
                </div>

                <!-- option for selecting age -->

                <div class="col-md-2">
                    <label for="age" class="form-label">age</label>
                    <select id="age" name="age" class="form-select">
                    <option selected>Choose...</option>
                    <?php
                        for($i=18;$i<70;$i++){
                            ?>
                                <option value=" <?php echo $i; ?> "><?php echo $i; ?></option>
                            <?php
                        }
                        

                    ?>
                    </select>
                </div>
                
                <!-- text box for email -->


                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>

                <!-- option for selection department -->
                <div class="col-md-4">
                    <label for="department" class="form-label">Select Department</label>
                    <select id="department" name="department" class="form-select">
                    <option selected>Choose...</option>
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

                
                <!-- mobile no -->
                <div class="col-md-6">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="number" class="form-control" name="mobile" id="mobile">
                </div>

                <!-- father name -->
                <div class="col-md-6">
                    <label for="fname" class="form-label">Father Name</label>
                    <input type="text" name="fname" class="form-control" id="fname">
                </div>
                
                <!-- address -->
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" name ="address" id="inputAddress" placeholder="1234 Main St">
                </div>
                <!-- city -->
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" name="city"class="form-control" id="inputCity">
                </div>


                <!-- pincode -->
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">PIN</label>
                    <input type="text" name="zip" class="form-control" id="inputZip">
                </div>



                
                
                
                <!-- button  -->
                <div class="col-12" align="center">
                    <button name="submit" type="submit" class="btn btn-primary">Add Faculty</button>
                </div>
            </form>

        </div>
        <script>
            $(document).ready(function () {
                
            });
</script>
    <?php
    include "footer_code.php";
    ?>




