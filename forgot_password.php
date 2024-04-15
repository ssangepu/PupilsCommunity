<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<header>
<div class="container">
</div>
</header>
<?php
require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($db_con, $email);
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($db_con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($db_con, $password);
        $query    = "SELECT * FROM `users` WHERE username='$username' AND email='$email'";
        $result = mysqli_query($db_con, $query);
        $rows = mysqli_num_rows($result);
        $result   = mysqli_query($db_con, $query);
        if ($rows == 1 ) {
            $query    = "update `users` set password='$password' where username='$username'";
            $result = mysqli_query($db_con, $query);
            echo "<div class='form'>
                  <h3>Updated password successfully</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
                  </div>";
        }
        else {
            echo "<div class='form'>
                  <h3>Invalid Details.</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
                  </div>";
        }
    
    }

 else {
?>
<h1 style="font-size:45px;text-align:center;color:#FF0000">Pupils Community</h1>
    <form class="form" action="" method="post">
        <h1 class="login-title">Forgot Password</h1>
        <input type="email" class="login-input"  name="email" placeholder="Email" required />
        <input type="username" class="login-input" name="username" placeholder="username" required />
        <input type="password" class="login-input" name="password" placeholder="password" required />
        <input type="submit" name="submit" value="Reset Password" class="login-button">
        <p class="link"><a href="index.php">Click to Login</a></p>
    </form>
    </div>
</body>
<?php
    }
?>
</html>