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

if(isset($_POST['add_teacher'])){
    $t_name=$_POST['name'];
    $t_email=$_POST['email'];
    $t_phone=$_POST['phone'];
    $t_password=$_POST['password'];
    $t_department=$_POST['department'];
    $file=$_FILES['image']['name'];
    $dst="./Teacher_image/".$file;
    $dst_db="image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    $sql="INSERT INTO teachers(Name,Email,Phone,Password,Department,Image) VALUES ('$t_name','$t_email','$t_phone','$t_password','$t_department','$dst_db')";

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




?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" type="text/css" href="admin_add_teacher.css">
    </head>
    <body>

        <?php
            include 'admin_sidebar.php';
        ?>

        <div class="content">
            <h1>Add Teachers</h1>
            <br>
            <div>
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Teacher Name:</label>
                    <input type="text" placeholder="Enter name" name="name">  
                </div>
                <div>
                    <label>Email:</label>
                    <input type="text" placeholder="Enter email" name="email">  
                </div>
                <div>
                    <label>Phone:</label>
                    <input type="number" placeholder="Enter phone" name="phone">  
                </div>
                <div>
                    <label>Password:</label>
                    <input type="text" placeholder="Enter password" name="password">  
                </div>
                <div>
                    <label>Department:</label>
                    <input type="text" placeholder="Enter Department" name="department">  
                </div>
                <div>
                    <label>Image:</label>
                    <input type="file" name="image">  
                </div>
                <br>
                <center>
                <a href=""><input type="submit" name="add_teacher" value="Add Teacher"></a>
                </center>
            </form>

            </div>

        </div>
    </body>
</html>