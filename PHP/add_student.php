<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location:log_in.php");
}
elseif($_SESSION['Usertype']=='student'){
    header("location:log_in.php");
}

$host="localhost";
$user="root";
$password="";
$db="student management system";

$data=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['add_student'])){
    $user_name=$_POST['name'];
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $user_password=$_POST['password'];
    $user_type="student";

    $check="SELECT * FROM users WHERE Username='$user_name'";

    $check_user=mysqli_query($data,$check);

    $row_count=mysqli_num_rows($check_user);

    if($row_count){
        echo "<script type='text/javascript'>
        alert('Username Already Exists!');
        </script>";
    }
    else{
        $sql="INSERT INTO users(Username,Email,Phone,Usertype,Password) VALUES ('$user_name','$user_email','$user_phone','$user_type','$user_password')";

        $result=mysqli_query($data,$sql);

        if($result){
            echo "<script type='text/javascript'>
            alert('Data Upload Successful!');
            </script>";
        }
        else{
            echo "Upload Failed!";
        }
    }
}



?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" type="text/css" href="../CSS/add_student.css">
    </head>
    <body>

        <?php
            include 'admin_sidebar.php';
        ?>

        <div class="content">
            <h1>Add Student</h1>
            <br>
            <div>
                <form action="#" method="POST">
                    <div>
                        <label>Username:</label>
                        <input type="text" placeholder="Enter username" name="name">  
                    </div>
                    <div>
                        <label>Email:   </label>
                        <input type="text" placeholder="Enter email" name="email">  
                    </div>
                    <div>
                        <label>Phone:   </label>
                        <input type="number" placeholder="Enter phone" name="phone">  
                    </div>
                    <div>
                        <label>Password:</label>
                        <input type="text" placeholder="Enter password" name="password">  
                    </div>
                    <br>
                    <center>
                    <a href=""><input type="submit" name="add_student" value="Add Student"></a>
                    </center>
                </form>
            </div>
        </div>
    </body>
</html>