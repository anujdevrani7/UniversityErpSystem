<?php
    include "nav_code.php";
        ?>
            <h1 align ="center">Resources </h1>
            <div class="resource_container">
                
                <?php
                    $query="SELECT * FROM `subject` WHERE course_name ='{$_SESSION["department"]}' AND semester='{$_SESSION['semester']}'";
                    
                    $result=mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            ?>
                                <div class="resource" >
                                    <h3 style="text-transform: capitalize;"><?php echo $row['subject_name'] ?></h3>
                                    <h6 style="overflow-y:scroll; ">
                                        <?php
                                            $query="SELECT * FROM resources WHERE subject_name ='{$row['subject_name']}' and course='{$_SESSION["department"]}' and semester='{$_SESSION['semester']}'";
                                            
                                            $res=mysqli_query($conn,$query);
                                            if(mysqli_num_rows($res)>0){
                                                while($rows=mysqli_fetch_assoc($res)){
                                                    ?>
                                                        <p ><marquee style="widht:204px;"behavior="scroll" direction="" scrollamount="2"><?php echo $rows['lesson_name']; ?></marquee><br></p>
                                                    <?php
                                                }
                                            }
                                            else{
                                                ?>
                                                    <p ><marquee style="widht:204px;"behavior="scroll" direction="" scrollamount="2"><?php echo "no data found"?></marquee><br></p>
                                                <?php
                                            }

                                        ?>
                                        
                                    </h6>
                                    <button type="button" id="<?php echo $row['subject_name'] ;?>" name="submit" class="btn btn-outline-primary">Explore</button>
                                    

                                </div>
                            <?php
                        }
                    }
                    else{
                        // if no subject is added 
                    }
                ?>
            
            <!-- <div class="resource_container">
                <div class="resource">
                    <h3>java</h3>
                    <button type="button" class="btn btn-outline-primary">Primary</button>


                </div>
                <div class="resource">
                    <h3>java</h3>
                    <button type="button" class="btn btn-outline-primary">Primary</button>
                </div>
                <div class="resource">
                    <h3>java</h3>
                    <button type="button" class="btn btn-outline-primary">Primary</button>
                </div>
                <div class="resource">
                    <h3>java</h3>
                    <button type="button" class="btn btn-outline-primary">Primary</button>
                </div>
                <div class="resource">
                    <h3>java</h3>
                    <button type="button" class="btn btn-outline-primary">Primary</button>
                </div>
                <div class="resource">
                    <h3>java</h3>
                    <button type="button" class="btn btn-outline-primary">Primary</button>
                </div> -->
                
            </div>
            <script>
                $(document).ready(function () {
                    $("button").click(function(){
                       
                        var x= $(this).attr("id");
                        console.log(x);
                        // alert("id of this butto is  : "+x);
                        window.location.href='course_content.php?c_name='+x;

                    })
                    
                });
            </script>
        <?php
    include "footer_code.php";
?>