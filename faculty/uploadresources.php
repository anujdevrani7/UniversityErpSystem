<?php
include "nav.php";
?>

<h1 align="center">Upload Resources </h1>
<form action="allformdata.php" method="POST" enctype="multipart/form-data" >
    <!-- chooe subject  code -->
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
                    <option value="<?php echo $row['semester']." ".$row['subject_name']; ?>">
                    <?php echo strtoupper($row['subject_name']); echo "  Semester  (" .$row['semester'].")"; ?></option>

                    <?php

                }


            }
                        

        ?>
    </select>
    </div>


    <div class="uploadresourcecontainer">
        <div class="form-floating mb-3">
            <input type="text" name="lesson_name" class="form-control" id="floatingInput" placeholder="lesson name">
            <label for="floatingInput">Lesson Name</label>
        </div>
        <div class="form-floating">
            <textarea name="lesson_content" class="form-control" placeholder="lesson content" id="floatingTextarea2"
                style="height: 700px"></textarea>
            <label for="floatingTextarea2">Write lesson content </label>
        </div>
        <div class="form-floating">
            <input name="link" type="text" class="form-control" id="floatingPassword" placeholder="link">
            <label for="floatingPassword">Embeded Youtube Video Link</label>
        </div>
        <!-- <div class="form-floating mb-3">
            <input name="file" type="file" class="form-control" id="floatingInput" placeholder="upload file">
            <label for="floatingInput">Upload a file </label>
        </div> -->

        <div align="center" style="margin: 0px;padding: 0px; margin-top:30px;">
            <button align="center" type="submit" name="uplodResources" class="btn btn-outline-primary">Upload resource</button>
        </div>
    </div>


</form>



<?php
include "footer.php";
?>