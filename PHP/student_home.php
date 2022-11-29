<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location:log_in.php");
}
elseif($_SESSION['Usertype']=='admin'){
    header("location:log_in.php");
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student Dashboard</title>
        <link rel="stylesheet" type="text/css" href="../CSS/student_home.css">
    <body>
        
        <?php
            include 'student_sidebar.php';
        ?>
        
        <div class="content">

        </div>
    </body>
</html>