<?php
    include "sesson.php";
    include "../admin/connect_db.php";
    // include "footer_code.php";

    if(isset($_GET['show_content'])){
        $subject= $_GET['show_content'];
        $lesson=$_POST['lesson'];
        $query="SELECT * FROM resources WHERE subject_name ='$subject' and course='{$_SESSION["department"]}' and semester='{$_SESSION['semester']}' and lesson_name='$lesson'";
        ?>
            <style>
                .rescont{
                    height:auto;

                }
                .rescont{
                    padding:12px;
                }
                .main_cont{
                    padding:12px 0px;
                }

            </style>
            <?php
                $result=mysqli_query($conn,$query);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                        $url=$row['embed_link'];
                        $url=str_replace('watch?v=','embed/',$url);
                        
                        
                        ?>
                            <div class="rescont">
                                <h1 ><?php echo $lesson; ?></h1>
                                <div class="main_cont">
                                    <?php
                                        $c=fopen($row['lesson_content'],"r");
                                        while(!feof($c)){
                                        echo fgets($c);
                                        echo "<br>";
                        
                        
                                        }
                                    ?>
                                </div>
                                <div class="video">
                                    <iframe width="100%" height="387" src="<?php echo $url; ?>"  frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                                
                                    </iframe>
                                    <!-- <iframe width="688" height="387" src="https://www.youtube.com/embed/qB1wWuczo90" title="CarryMinati TROLLED Elvish Yadav? Says SORRY! | Elvish ARRESTED?, Ashish TRANSFORMATION, MrBeast |"allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                                </div>
                            </div>
                        
                            
                        <?php
                    }
                }

            ?>
        <?php


       

    
    }



    // start conversation code
    if(isset($_GET['sendPress'])){
        // echo "hello word";
        
       
        $query="insert into inbox (sender,reciever,message)VALUES('{$_SESSION["sid"]}','{$_POST['receiverid']}','{$_POST['msg']}')";
        if(mysqli_query($conn,$query)){
            echo "message send";
        }
        else{
            echo "not send ";
        }
    }



?>