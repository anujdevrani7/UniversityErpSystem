


<?php
    // include "nav_code.php";
    // echo $_POST['reciver'];
    // include "sesson.php";
    include "../admin/connect_db.php";
   
    ?>
        <style>
            .popup{
                height:83vh;
                width:75vw;
                /* display:flex; */
                flex-wrap:wrap;
                position:absolute;
                /* border:3px solid black; */
                box-shadow: 2px 2px 9px 12px black;
                left:50%;
                top:50%;
                transform:translate(-50%,-50%);
                /* background-color:grey; */
                

            }
            .popup span{
                position: absolute;
                top:0px;
                right:0px;
                height:40px;
                width:40px;
                background-color:red;
                color:white;
                font-weight:bolder;
                text-align:center;
                line-height:40px;
                cursor:pointer;
                z-index: 3;
            }
            .chatwith{
                height:40px;
                background-color :green;
                line-height:40px;
                padding-left:12px;
                

            }
            .messagebody{
                height:90%;
                background-color:black;
                padding:12px;
                overflow-y:scroll;
            }
           
            .sender{
               
                /* border:2px solid red; */
                display:flex;
                flex-wrap:wrap;
                color:white;
                margin: 20px 0px;
                /* height: 45px; */
                justify-content:left;

            }
            .reciever{
                display:flex;
                flex-wrap:wrap;
                justify-content:right;
                /* border:2px solid red; */
                color:white;
                margin: 20px 0px;
                /* height: 45px; */
                text-align: right !important;
            }
            
            .txt{
                /* border: 2px solid red; */
                /* height: 5%; */
                height: 39px;
                display:flex;
                padding-left:12px;

                padding-right:12px;
                
                background-color: black;
            }
            .txt input{
                height:100%;


            }
            .mess{
                width:80%;
            }
            .sendbutton{
                width: 20%;
            }
            .sender p{
                background-color:purple;
                display:inline;
                padding: 12px;
                /* margin-top: 12px; */
                font-size: 20px;
                font-family: cursive;
                border-radius: 17px;

            }
            .reciever p{
                background-color:pink;

                display:inline;
                padding: 12px;
                /* margin-top: 12px; */
                font-size: 20px;
                font-family: cursive;
                border-radius: 17px;
                

            }
            .chatwith p{
                font-size: 18px;
                font-weight: bolder;
                text-transform: capitalize;
            }
        </style>
        <div class="popup">
            <span>X</span>
            <div class="chatwith">
                <?php  
                    $query1="SELECT first_name FROM student_details WHERE sid='{$_POST['reciver']}'";
                    $result1=mysqli_query($conn,$query1);
                    while($row1=mysqli_fetch_assoc($result1)){
                        
                        ?> 
                            <p><?php echo $row1['first_name'] ?></p>
                            <?php
                        }
                ?>
                <!-- <p>Anuj (active)</p> -->

                
            </div>

            


            <div class="messagebody">
                <!-- write a query to select messages form the databases  -->

            <?php
                include 'load_messages.php';


                
            ?>

                <!-- <div class="reciever">
                    <p>hello kaku </p>
                </div>
                <div class="reciever">
                    <p>hello kaku </p>
                </div>
                
                <div class="reciever">
                    <p>hello kaku </p>
                </div>
                <div class="reciever">
                    <p>hello kaku </p>
                </div>
                <div class="reciever">
                    <p>hello kaku </p>
                </div> -->
                
                

            </div>
            <div class="txt">
                <textarea name=""  class="form-control mess" placeholder="Leave a comment here" id="msgtext" style="height: 90%"></textarea>
                <button id="msgSendButton"class="btn btn-primary sendbutton">send</button>
                <!-- <button>send</button> -->
                

            </div>
            



            <!-- <div class="inbconatiner">
            <div class="head">Anuj</div>
            <div class="conversation">
                <div class="sender">
                    <p class="msg">hello anuj</p>
                </div>
                <div class="reciever">
                    <p class="msg">hello anuj</p>
                </div>
                <div class="sender">
                    <p class="msg" >hello anuj</p>   
                </div>
                <div class="sender">
                    <p class ="msg">hello anuj</p>
                </div>
            </div> -->
        </div>
            

        </div>



        <!-- my previous code of jquery  -->
        <!-- <script>
            $(document).ready(function () {
                
                $(".conv").show();
                $(".popup span").click(function(){
                    $(".conv").hide();

                })
                $("#msgSendButton").click(function(){
                    var textareavalue=$("#msgtext").val();
                    if(textareavalue.trim() === ''){
                        // alert("empty");
                        
                    }
                    else{
                        var sendto=" echo $_POST['reciver'] ;";
                        // alert("not empty");
                        $.ajax({
                            type: "POST",
                            url: "allformdata.php?sendPress",
                            data: {msg:textareavalue,receiverid:sendto},
                            
                            success: function (response) {
                                
                            }
                            
                        });
                        
                    }
                }) 

                



       

                
                

                

            });
        </script>-->


        <!-- chat gpt code  -->
        <script>
            
            $(document).ready(function () {
                
                
                $(".conv").show();
                $(".popup span").click(function(){
                    
                    $(".conv").hide();
                    
                });

                $("#msgSendButton").click(function(){
                    var textareavalue=$("#msgtext").val();
                    if(textareavalue.trim() === ''){
                        // alert("empty");
                    } else {
                        var sendto="<?php echo $_POST['reciver'] ;?>";
                        $.ajax({
                            type: "POST",
                            url: "allformdata.php?sendPress",
                            data: {msg:textareavalue,receiverid:sendto},
                            success: function (response) {
                                $("#msgtext").val('');
                                
                                
                            }
                        });
                    }
                });

               



                // Function to refresh the message body
                function refreshMessages() {
                    
                    var recipientId = "<?php echo $_POST['reciver']; ?>";

                    // Save the current scroll position
                    var $messageBody = $(".messagebody");
                    var isScrolledToBottom = $messageBody[0].scrollHeight - $messageBody.scrollTop() === $messageBody.outerHeight();




                    // latest chat gpt code 21,11,2023
                    if (!$(".conv").is(":hidden")) {
                        // Make an AJAX request to fetch the latest messages
                        $.ajax({
                            type: "POST",
                            url: "load_messages.php",
                            data: { reciver: recipientId },
                            success: function (response) {
                                // Update the message body with the latest messages
                                $messageBody.html(response);

                                // Restore the scroll position to the bottom if it was at the bottom before the update
                                if (isScrolledToBottom) {
                                    $messageBody.scrollTop($messageBody[0].scrollHeight);
                                }
                            }
                        });
                    }
                    else{
                        window.location.href='inbox.php';
                    }










                    // Make an AJAX request to fetch latest messages
                    // $.ajax({
                    //     type: "POST",
                    //     url: "load_messages.php", 
                    //     data: { reciver: recipientId },
                    //     success: function (response) {
                    //     // Update the message body with the latest messages
                    //     $messageBody.html(response);
                                

                    //         // Restore the scroll position to the bottom if it was at the bottom before the update
                    //         if (isScrolledToBottom) {
                    //             $messageBody.scrollTop($messageBody[0].scrollHeight);
                    //         }
                    //     }
                    // });
                    
                    
                }
                setInterval(refreshMessages, 1000);
                

                
                

            });
        </script>
    <?php
   
    

    

?>

