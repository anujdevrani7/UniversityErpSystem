<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>this is logout page </title>
</head>
<body>
    <?php
        ?>
            <h1>this is logout page </h1>
        <?php
        
        session_start();
        
        session_unset();
        session_destroy();
        
        
        
        header("Location:index.php");
        //header("Location:index.php");
    ?>
</body>
</html>