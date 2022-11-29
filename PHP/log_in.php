<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/log_in.css">
    <title>Student Management System</title>
</head>
<body>
    <h1>Log in</h1>
    <h4>
      <?php

        error_reporting(0);
        session_start();
        session_destroy();
        echo $_SESSION['loginMessage'];
        
      ?>
    </h4>
    <form action="login_check.php" method="POST">
        <div class="login">
            <div>
                <label>Username : </label>
                <input type="text" placeholder="Enter Username" name="username" required>  
            </div>
            <div>
                <label>Password : </label>   
                <input type="password" placeholder="Enter Password" name="password" required>  
            </div>
            <input type="checkbox">Remember me
            <button type="submit">Log in</button>
            <a href="">Forgot password</a>
        </div>
    </form>
</body>
</html>