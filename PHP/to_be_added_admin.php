<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location:log_in.php");
}
elseif($_SESSION['Usertype']=='student'){
    header("location:log_in.php");
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" type="text/css" href="../CSS/to_be_added_admin.css">
    </head>
    <body>

        <?php
            include 'admin_sidebar.php';
        ?>

        <div class="content">
            <h1>To Be Added</h1>
        </div>
    </body>
</html>