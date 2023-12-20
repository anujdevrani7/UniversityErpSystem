<?php
include "nav.php";
// writing  code for sending emails 
?>
    <h1 align="center" style="margin-bottom:20px;">Send Mail</h1>
    
    <div class="add_student_form">
        <h6 align="center ">select recivers</h6>

            <form class="row g-3" style="padding:0px 12px;"method="POST" action="allformdata.php" enctype="multipart/form-data">
                
                
                <div class="form-check col-md-4">
                    <label class="form-check-label" for="flexCheckDefault">
                        Students
                    </label>
                    <input class="form-check-input c1" type="checkbox" name="students_detail"  value="student_detail" id="flexCheckDefault">
                    
                </div>
                <div class="form-check col-md-4">
                    <input class="form-check-input c2" type="checkbox" value="admin" name="admin" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Admin
                    </label>
                </div>
                <div class="form-check col-md-4">
                    <input class="form-check-input c3" type="checkbox"  name ="faculty_details"value="faculty_details" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Faculty
                    </label>
                </div>
                
                <div class="form-floating mb-3 col-md-4">
                    <!-- <p>enable </p> -->
                    <input type="text" name="pass" class="form-control in" id="floatingInput" placeholder="enter uid">
                    <label for="floatingInput">Password provided by google  </label>
                 </div>
                 
                <h6 align="center">Mail Content</h6>
                <div class="form-floating mb-3 col-md-10">
                    <input type="text" name="id" class="form-control" id="floatingInput" placeholder="Subject of mail">
                    <label for="floatingInput">Subject </label>
                </div>
                <!-- mail attachments  -->
                <div class="col-md-10 ">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Send Attachments</label>
                        <input class="form-control" name="img" type="file" id="formFile">
                    </div>
                </div>
                
                <!-- mail message  -->
                <div class="form-floating">
                    <textarea name="mailbodyy" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 350px"></textarea>
                    <label for="floatingTextarea2">Mail Body </label>
                </div>

                
                <!-- button  -->
                <div class="col-12" align="center">
                    <button name="msub" type="submit" class="btn btn-primary">Send Mail</button>
                </div>
            </form>

        </div>

        <!-- <script>
            $(document).ready(function () {
                // alert("hello jquerry is working fine");
                // $("#select_student,#select_faculty,#select_admin" ).hide();
                // if($("#flexCheckDefault").is(":checked")){
                //     alert("all are checked");
                // }
                // $(".c1,.c2,.c3").hide();
                $(".c1,.c2,.c3").click(function(){
                    if($(".c1").is(":checked") && $(".c2").is(":checked") && $(".c3").is(":checked")){
                    $(".in").attr("disabled","disabled");
                    
                    }
                    else{
                        $(".in").removeAttr("disabled");

                    }
                })
                
                
            });
        </script>
   -->
<?php


include "footer.php";

?>