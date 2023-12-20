<?php
    include "nav_code.php";
    ?>    




<div class="tbcontainer">
    <div class="conv">
        <!-- this is for popup chats window  -->
    </div>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>semester</th>
                <th>Start Chat</th>
            </tr>

            <?php

                $query="SELECT * FROM `student_details` WHERE department='{$_SESSION["department"]}' AND semester='{$_SESSION["semester"]} 'and sid!='{$_SESSION["sid"]}'";
                $result=mysqli_query($conn,$query);
                if($result){
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                        <td><?php echo $row['sid']; ?></td>
                                        <td><?php echo $row['first_name']; ?></td>
                                        <td><?php echo $row['department']; ?></td>
                                        <td><?php echo $row['semester']; ?></td>
                                        
                                        <!-- <td><button class="cht" data="<?php echo $row['sid']; ?>">Chat </button></td> -->
                                        <td><button  data="<?php echo $row['sid']; ?>"  class="btn btn-outline-info cht">Chat</button> </td>  
                                    </tr>
                            <?php
                        }

                    }
                    

                }
                else{
                    echo "error in query ";
                }
            ?>

            
        </table>
        
    </div>
    
    </div>
    <script>
        $(document).ready(function () {
            
           
            
            $(".cht").click(function(){
                var id=$(this).attr("data");
               

                $.ajax({
                        type: "POST",
                        url: "conversation.php",
                        data: {reciver:id},  
                        success: function (data){
                            $(".conv").html(data);
                        }
                });
                
            })
        });
    </script>
    
<?php

include "footer_code.php";
?>   
