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
$sql="SELECT * from users WHERE Usertype='student'";

$result=mysqli_query($data,$sql);

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" type="text/css" href="../CSS/view_student.css">
    </head>
    <body>

        <?php
            include 'admin_sidebar.php';
        ?>

        <div class="content">
            <h1>Student Data</h1>
            <br>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>

                <?php

                while($info=$result->fetch_assoc()){    

                ?>

                <tr>
                    <td><?php echo "{$info['Username']}"; ?></td>
                    <td><?php echo "{$info['Email']}"; ?></td>
                    <td><?php echo "{$info['Phone']}"; ?></td>
                    <td><?php echo "{$info['Password']}"; ?></td>
                    <td><?php echo "<a onClick=\"javascript:return confirm('Are You Sure?')\" href='delete.php?student_id={$info['id']}'>Delete</a>"; ?></td>
                    <td><?php echo "<a href='update_student.php?student_id={$info['id']}'>Update</a>"; ?></td>
                </tr>

                <?php

                }

                ?>

            </table>
        </div>
    </body>
</html> 
