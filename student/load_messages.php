<?php
    include "sesson.php";
    include "../admin/connect_db.php";

    $query = "SELECT * FROM inbox WHERE (sender = '{$_POST['reciver']}' AND reciever = '{$_SESSION["sid"]}') OR (sender = '{$_SESSION["sid"]}' AND reciever = '{$_POST['reciver']}') ORDER BY date DESC";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if($row['sender'] == $_SESSION["sid"]) {
                ?>
                <div class="reciever">
                    <p><?php echo $row['message'] ?></p>
                </div>
                <?php
            } else {
                ?>
                <div class="sender">
                    <p><?php echo $row['message'] ?></p> 
                </div>
                <?php
            }
        }
    }
?>
