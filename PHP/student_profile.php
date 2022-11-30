<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location:log_in.php");
}
elseif($_SESSION['Usertype']=='admin'){
    header("location:log_in.php");
}


$host="localhost";
$user="root";
$password="";
$db="student management system";

$data=mysqli_connect($host,$user,$password,$db);

$name=$_SESSION['username'];

$sql="SELECT * FROM users WHERE Username='$name'";

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];

    $query="UPDATE users SET Username='$name',Email='$email',Phone='$phone',Password='$password' WHERE username='$name'";

    $result2=mysqli_query($data,$query);

    if($result2){
        header("location:student_profile.php");
    }
    else{
        echo "Update Failed!";
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student Profile</title>
        <link rel="stylesheet" type="text/css" href="../CSS/student_profile.css">
    <body>
        
        <?php
            include 'student_sidebar.php';
        ?>
        
        <div class="content">
            <h1>Student Profile</h1>
            <br>
            <div>
            <form action="#" method="POST">
                <div>
                    <label>Name:</label>
                    <input type="text" placeholder="Enter username" name="name" value="<?php echo "{$info['Username']}";?>">  
                </div>
                <div>
                    <label>Email:</label>
                    <input type="text" placeholder="Enter email" name="email" value="<?php echo "{$info['Email']}";?>">  
                </div>
                <div>
                    <label>Phone:</label>
                    <input type="number" placeholder="Enter phone" name="phone" value="<?php echo "{$info['Phone']}";?>">  
                </div>
                <div>
                    <label>Password:</label>
                    <input type="text" placeholder="Enter password" name="password" value="<?php echo "{$info['Password']}";?>">  
                </div>
                <br>
                <a href=""><input type="submit" name="update" value="Update"></a>
            </form>

            </div>
        </div>
        <div class="footer">
            &copy Developed by <b>Aryak Bhattacharya</b>. All Rights Reserved.
        </div>
    </body>
</html>