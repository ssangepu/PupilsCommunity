<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Update</title>
    <h1 style="font-size:50px;text-align:center;color:#000000;background-color:white">Pupils Community</h1>
	<link rel="stylesheet" href="main.css"/>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<?php
	include('db.php');
	$id=$_GET['id'];
	$query=mysqli_query($db_con,"select * from `marketplace` where item_id='$id'");
	$row=mysqli_fetch_array($query);
?>
<form class="form" method="POST" name="edit" action="update.php?id=<?php echo $id; ?>">
    <h1 class="login-title">Edit</h1>
		<label>Price</label><input type="text" class="login-input" value="<?php echo $row['price']; ?>" name="price">
		<input type="submit" class="login-button" name="update">
		<p class="link"><a href="user_home.php">Home</a><p>
	</form>
</body>
</html>