<?php 

error_reporting(0);
session_start();

$host="localhost";
$user="root";
$password="";
$db="student management system";
$data=mysqli_connect($host,$user,$password,$db);

if($data===false){
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['username'];
    $pass=$_POST['password'];

    $sql="select * from users where username='".$name."' AND password='".$pass."' ";

    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);

    if($row["Usertype"]=="student"){
        $_SESSION['username']=$name;
        $_SESSION['Usertype']="student";
        header("location:student_home.php");
    }

    elseif($row["Usertype"]=="admin"){
        $_SESSION['username']=$name;
        $_SESSION['Usertype']="admin";
        header("location:admin_home.php");
    }

    else{

        $message= "Username or Password do not match";
        $_SESSION['loginMessage']=$message;

        header("location:log_in.php");
    }
}










?>