<?php

session_start();

$host="localhost";

$user="root";

$password="";

$db="student management system";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false){
    die("connection error");
}

if(isset($_POST['submit'])){
    $d_name=$_POST['name'];
    $d_email=$_POST['email'];
    $d_phone=$_POST['phone'];
    $d_message=$_POST['message'];

    $sql="INSERT INTO admission(Name,Email,Phone,Message) VALUES ('$d_name','$d_email','$d_phone','$d_message')";
    
    $result=mysqli_query($data,$sql);

    if($result){
        $_SESSION['message']="Submited Successfully!";
        header("location:index.php");
    }
    else{
        echo "Submition Not Successful!";
    }
}

?>