<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Pickup</title>
    <link rel="stylesheet" href="styles.css"/>
    <link rel="stylesheet" href="main.css"/>
    <header>
        <div class="container">
            <nav>
                <ul>
                <li><a href="user_home.php">Home</a>&nbsp;&nbsp;</li>
            <li><a href="posts.php">Posts</a>&nbsp;&nbsp;</li>
            <li><a href="accommodation.php">Accommodation</a>&nbsp;&nbsp;</li>
            <li><a href="my_items.php">My Items</a>&nbsp;&nbsp;</li>
            <li><a href="pickup.php">Pickup</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
                </ul>
            </nav>
                
        </div>
    </header>
</head>
<body>
<?php
require('db.php');
if(isset($_POST['pickup'])){
 $name = stripslashes($_REQUEST['name']);
 $name = mysqli_real_escape_string($db_con, $name);
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($db_con, $email);
 $mobileno = stripslashes($_REQUEST['mobileno']);
 $mobileno = mysqli_real_escape_string($db_con, $mobileno);
 $pickupDate = stripslashes($_REQUEST['pickupDate']);
 $pickupDate = mysqli_real_escape_string($db_con, $pickupDate);
 $flightno = stripslashes($_REQUEST['flightno']);
 $flightno = mysqli_real_escape_string($db_con, $flightno);
 $additionalInfo = stripslashes($_REQUEST['additionalInfo']);
 $additionalInfo = mysqli_real_escape_string($db_con, $additionalInfo);
 $query = "INSERT into `pickup`(name, email, mobileno, pickupDate, flightno, additionalInfo)
            VALUES ('$name','$email','$mobileno','$pickupDate','$flightno', '$additionalInfo')";
 $result =mysqli_query($db_con, $query);
 if ($result){
    echo "<div class='form'>
          <h3> Pick Request created successfully</h3><br/>
          <p class='link'><a href='user_home.php'>Home</a></p>
          </div>";
 }
 else{
    echo "<div class='form'>
          <h3>Pickup Request not completed</h3></br>
          <p class='link'><a href='addPickUpRequest.php'>Pick Up</a></p>
          </div>";
 }
}
else {
?>
<h1 style="font-size:45px;text-align:center;color:#FF0000">Pupils Community</h1>
    <form class="form" method="post" name="pickup">
        <h1 class="login-title">Pick Up</h1>
        <input type="text" class="login-input" name="name" placeholder="Name" require/>
        <input type="text" class="login-input" name="email" placeholder="Email" require/>
        <input type="text" class="login-input" name="mobileno" placeholder="Mobile No" require/>
        <input type="datetime-local" class="login-input" name="pickupDate" placeholder="Date" min="2024-03-22" require/>
        <input type="text" class="login-input" name="flightno" placeholder="Flight Number" require/>
        <textarea name="additionalInfo" rows="3" cols="65" placeholder="Any additinal information"></textarea>  
        <input type="submit" value="Pick Up" name="pickup" class="login-button"/>
  </form>
  <?php
}
?>
</body>
</html>