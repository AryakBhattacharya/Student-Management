<?php

session_start();
error_reporting(0);

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

$t_id=$_GET['teacher_id'];

if($t_id){

    $sql="SELECT * from teachers WHERE id='$t_id'";
    
    $result=mysqli_query($data,$sql);

    $info=$result->fetch_assoc();
}

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $department=$_POST['department'];
    $password=$_POST['password'];
    $file=$_FILES['image']['name'];
    $dst="./Teacher_image/".$file;
    $dst_db="image/".$files;

    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    if($file){
        $query="UPDATE teachers SET Name='$name',Email='$email',Phone='$phone',Department='$department',Password='$password',Image='$dst_db' WHERE id='$t_id'";
    }
    else{
        $query="UPDATE teachers SET Name='$name',Email='$email',Phone='$phone',Department='$department',Password='$password' WHERE id='$t_id'";
    }

    
    $result2=mysqli_query($data,$query);

    if($result2){
        header("location:admin_view_teacher.php");
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" type="text/css" href="admin_update_teacher.css">
    </head>
    <body>

        <?php
            include 'admin_sidebar.php';
        ?>

        <div class="content">
            <h1>Update Teacher Info</h1>
            <br>
            <div>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div>
                        <label>Name:</label>
                         <input type="text" name="name" value="<?php echo "{$info['Name']}";?>">  
                    </div>
                    <div>
                        <label>Email:</label>
                         <input type="text" name="email" value="<?php echo "{$info['Email']}";?>">  
                    </div>
                    <div>
                        <label>Phone:</label>
                        <input type="text" name="phone" value="<?php echo "{$info['Phone']}";?>">  
                    </div>
                    <div>
                        <label>Department:</label>
                        <input type="text" name="department" value="<?php echo "{$info['Department']}";?>">  
                    </div>
                    <div>
                        <label>Password:</label>
                        <input type="text" name="password" value="<?php echo "{$info['Password']}";?>">  
                    </div>
                    <!--div>
                        <label>Old Image:</label>
                        <img src="<?php echo "{$info['Image']}";?>">  
                    </div>
                    <div>
                        <label>Upload New Image:</label>
                        <input type="file" name="image">  
                    </div-->
                    <br>
                    <center>
                    <a href=""><input type="submit" name="update" value="Update"></a>
                    </center>
                </form>
            </div>
        </div>
    </body>
</html>