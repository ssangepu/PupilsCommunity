<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Post</title>
    <link rel="stylesheet" href="styles.css"/>
    <link rel="stylesheet" href="main.css"/>
<header>
<div class="container">
  <nav>
  <li><a href="user_home.php">Home</a>&nbsp;&nbsp;</li>
            <li><a href="accommodation.php">Accommodation</a>&nbsp;&nbsp;</li>
            <li><a href="pickup.php">Pickup</a>&nbsp;&nbsp;</li>
            <li><a href="posts.php">Posts</a>&nbsp;&nbsp;</li>
            <li><a href="my_items.php">My Items</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
        </ul>
    </nav>       
</div>
</header>
</head>
<body>
<?php
    require('db.php');
    include('user_session.php');
    // When form submitted, insert values into the database.
    if (isset($_POST['submit'])) {
        // removes backslashes
        $username = $_SESSION['username'];
        $post = stripslashes($_REQUEST['post']);
        $post = mysqli_real_escape_string($db_con, $post);
        $phnum = stripslashes($_REQUEST['phnum']);
        $phnum = mysqli_real_escape_string($db_con, $phnum);
        $query    = "INSERT into `posts` (post, phnum, username) VALUES ('$post', '$phnum', '$username')";
        $result   = mysqli_query($db_con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Posted successfully.</h3><br/>
                  <p class='link'>Click Here for <a href=posts.php'>Posts</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>You are not Eligible</h3><br/>
                  <p class='link'>Click here for <a href='home.php'>Posts</a> again.</p>
                  </div>";
        }
    }
else{

?>
<h1 style="font-size:30px;text-align:center;color:#000000">Pupils Community</h1>
    <form class="form" action="" method="post">
    <form>
    <h1 class="form-title">Post</h1>
    <textarea name="post" placeholder="Write your post" rows="4" columns = "60" required /></textarea>
    <input type="text" class="login-input" name="phnum" placeholder="Mobile No" required />
    <input type="submit" name="submit" value="Post" class="login-button">
    </form>
<?php
    }
?>

</body>


</html>