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
$sql="SELECT * from teachers";

$result=mysqli_query($data,$sql);

if($_GET['teacher_id']){
    $t_id=$_GET['teacher_id'];
    $sql2="DELETE FROM teachers WHERE id='$t_id' ";

    $result2=mysqli_query($data,$sql2);

    if($result){
        header("location:admin_view_teacher.php");
    }
}


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" type="text/css" href="admin_view_teacher.css">
    </head>
    <body>

        <?php
            include 'admin_sidebar.php';
        ?>

        <div class="content">
            <h1>Teacher Data</h1>
            <br>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th>Department</th>
                    <!--th>Image</th-->
                    <th>Delete</th>
                    <th>Update</th>
                </tr>

                <?php

                while($info=$result->fetch_assoc()){    

                ?>

                <tr>
                    <td><?php echo "{$info['Name']}" ?></td>
                    <td><?php echo "{$info['Email']}" ?></td>
                    <td><?php echo "{$info['Phone']}" ?></td>
                    <td><?php echo "{$info['Password']}" ?></td>
                    <td><?php echo "{$info['Department']}" ?></td>
                    <!--td><img src="<?php echo "{$info['Image']}" ?>"></td-->
                    <td><?php echo "<a onClick=\"javascript:return confirm('Are You Sure?')\" href='admin_view_teacher.php?teacher_id={$info['id']}'>Delete</a>" ?></td>
                    <td><?php echo "<a href='admin_update_teacher.php?teacher_id={$info['id']}'>Update</a>" ?></td>
                </tr>

                <?php

                }

                ?>

            </table>
        </div>
    </body>
</html> 
