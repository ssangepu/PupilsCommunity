<!DOCTYPE HTML>

<html>
<head>
<link rel="stylesheet" href="main.css"/>
    <link rel="stylesheet" href="styles.css"/>
    <head>
    <header>
    <nav>
        <ul>
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
<h3 class="login-title" style="font-size:50px;text-align:center">My Items</h1>
<div class="form">
<?php
 require('db.php');
 include('user_session.php');
 $username = $_SESSION['username'];
 $result = mysqli_query($db_con,"SELECT * from marketplace where username='$username'");

 echo "<table border='1'> 
 <tr>
 <th>Item</th>
 <th>Name</th>
 <th>Price</th>
 <th>Edit</th>
 <th>Delete</th>
 </tr>";
 while($row = mysqli_fetch_array($result))
 {
echo "<tr>";
echo "<td><img src='itemImages/{$row['imageName']}' width='100'></td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['price']."</td>";
?>
 <td><a href="edit.php?id=<?php echo $row['item_id']; ?>">Edit</a></td>
 <td><a href="delete.php?id=<?php echo $row['item_id']; ?>">Delete</a></td>
<?php
 }
 ?>
 </div>
</body>