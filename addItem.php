<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Home Page</title>
    <link rel="stylesheet" href="styles.css"/>
    <link rel="stylesheet" href="main.css"/>
    <header>
    <div class="container">
    <nav>
        <ul>
        <li><a href="accommodation.php">Accommodation</a>&nbsp;&nbsp;</li>
            <li><a href="marketplace.php">Marketplace</a>&nbsp;&nbsp;</li>
            <li><a href="my_items.php">My Items</a>&nbsp;&nbsp;</li>
            <li><a href="pickup.php">Pickup</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
        </ul>
    </nav>
        
        
</div>
</header>
</head>
<?php

require('db.php');
include('user_session.php');
    if (isset($_POST['additem'])) {
        $username = $_SESSION['username'];
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($db_con, $name);
        $phnum = stripslashes($_REQUEST['phnum']);
        $phnum = mysqli_real_escape_string($db_con, $phnum);
        $price    = stripslashes($_REQUEST['price']);
        $price   = mysqli_real_escape_string($db_con, $price);
        $imageName = $_FILES['productImg']['name'];
        $destination = 'itemImages/'. $imageName;
        move_uploaded_file($_FILES['productImg']['tmp_name'], $destination);
        $query    = "INSERT into `marketplace` (name, username, phnum, imageName, price)
                     VALUES ('$name','$username', '$phnum', '$imageName', '$price')";
        $result   = mysqli_query($db_con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Successfully added product
                  </h3><br>
                  <p class='link'>Click here to <a href='user_home.php'>Add another product</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='sellProduct.php'>Add a product</a></p>
                  </div>";
        }
    } else {
?>

<h1 style="font-size:45px;text-align:center;color:#FF0000">Pupils Community</h1>
    <form class="form" action="" method="post" name="additem" enctype="multipart/form-data">
        <h3 class="login-title">Add Item</h3>
        <input type="file" class="login-input" name="productImg" placeholder="Product Image"/>
        <input type="text" class="login-input" name="name" placeholder="Product Name" required/>
        <input type="text" class="login-input" name="phnum" placeholder="Contact Number" required/>
        <input type="text" class="login-input" name="price" placeholder="Price" required>
        <input type="submit" value="additem" name="additem" class="login-button"/>
</form>
    </div>
    </body>
<?php
    }
?>
</html>

