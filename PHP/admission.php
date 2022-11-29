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
$sql="SELECT * from admission";

$result=mysqli_query($data,$sql);


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" type="text/css" href="../CSS/admin_admission.css">
    </head>
    <body>

        <?php
            include 'admin_sidebar.php';
        ?>

        <div class="content">
            <h1>Admission</h1>
            <br>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                </tr>

                <?php

                while($info=$result->fetch_assoc()){    

                ?>

                <tr>
                    <td><?php echo "{$info['Name']}"; ?></td>
                    <td><?php echo "{$info['Email']}"; ?></td>
                    <td><?php echo "{$info['Phone']}"; ?></td>
                    <td><?php echo "{$info['Message']}"; ?></td>
                </tr>

                <?php

                }

                ?>

            </table>
        </div>
    </body>
</html>




