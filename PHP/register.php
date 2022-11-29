<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/register.css">
    <title>Student Management System</title>
</head>
<body>
    <h1>Register</h1>
    <h4>
      <?php

        error_reporting(0);
        session_start();
        session_destroy();
        echo $_SESSION['loginMessage'];
        
      ?>
    </h4>
    <form action="data_check.php" method="POST">
        <div class="register">
            <div>
                <label>Name:</label>
                <input type="text" placeholder="Enter name" name="name" required>  
            </div>
            <div>
                <label>Email: </label>   
                <input type="text" placeholder="Enter email id" name="email" required>  
            </div>
            <div>
                <label>Phone: </label>   
                <input type="number" placeholder="Enter number" name="phone">  
            </div>
            <div>
                <label>Message: </label>
                <textarea rows="10" cols="48" placeholder="Enter message" name="message"></textarea>   
            </div>
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
</body>
</html>