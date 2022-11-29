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

$id=$_GET['student_id'];

$sql="SELECT * from users WHERE id='$id'";

$result=mysqli_query($data,$sql);

$info=$result->fetch_assoc();

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];

    $query="UPDATE users SET Username='$name',Email='$email',Phone='$phone',Password='$password' WHERE id='$id'";

    $result2=mysqli_query($data,$query);

    if($result2){
        header("location:view_student.php");
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" type="text/css" href="update_student.css">
    </head>
    <body>

        <?php
            include 'admin_sidebar.php';
        ?>

        <div class="content">
            <h1>Update Student Info</h1>
            <br>
            <div>
                <form action="#" method="POST">
                    <div>
                        <label>Username:</label>
                         <input type="text" name="name" value="<?php echo "{$info['Username']}";?>">  
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
                        <label>Password:</label>
                        <input type="text" name="password" value="<?php echo "{$info['Password']}";?>">  
                    </div>
                    <br>
                    <center>
                    <a href=""><input type="submit" name="update" value="Update"></a>
                    </center>
                </form>
            </div>
        </div>
    </body>
</html>