<?php

error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message']){
    $message=$_SESSION['message'];

    echo "<script type='text/javascript'>
        alert('$message');
    </script>";
}

?>


<!DOCTYPE html>
<html>
    <head>
        <metacharset="utf-8">
        <title>Student Management System</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <header class="header">
            <h1>Welcome to Qlympus Student Management Systems</h1>
        </header>
        <div class="entrance">
            <a href="register.php"><button type="submit">Register</button></a>
            <a href="log_in.php"><button type="submit">log in</button></a>
        </div>
    </body>
</html>