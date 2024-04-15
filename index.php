<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    if (isset($_POST['login'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($db_con, $username);
        $_SESSION['username'] = $username;
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($db_con, $password);
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='$password'";
        $result = mysqli_query($db_con, $query);
        $rows = mysqli_num_rows($result);   
        if ($rows == 1 ) {
            header("Location: user_home.php");}
        else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<h1 style="font-size:45px;text-align:center;color:#FF0000">Pupils Community</h1>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>

        <input type="submit" value="Login" name="login" class="login-button"/>
        <p class="link"><a href="forgot_password.php">Forgot Password</a></p>
        <p class="link"><a href="registration.php">Create an account</a></p>
     
    </form>
<?php
    }
?>
</body>
</html>