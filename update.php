<?php
	include('db.php');
	$id=$_GET['name'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
	mysqli_query($db_con,"update `marketplace` set price='$price' where item_id='$id'");
	echo "<div class='form'>
    <h3>Updated succesfully</h3><br/>
    <p class='link'>Click here to see items<a href='user_home.php'>Home</a></p>
    </div>";
?>