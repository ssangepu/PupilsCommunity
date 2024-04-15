<!DOCTYPE HTML>

<html>
<head>

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
<body>

<h1 style="font-size:45px;text-align:center;color:#FF0000">Pupils Community</h1>

 <div class="form">
 <h1 class="login-title">Items</h1> 
<?php
 require('db.php');
 include('user_session.php');
 $result = mysqli_query($db_con,"SELECT marketplace.name as item_name, users.name as usrname, price,  imageName, mobileno FROM marketplace JOIN users ON marketplace.username=users.username");
 
 echo "<table border='1'> 
 <tr>
 <th>Item</th>
 <th>Name</th>
 <th>Price</th>
 <th>Seller  Name</th>
 <th>Contact  Details</th>
 </tr>";
 while($row = mysqli_fetch_array($result))
 {
echo "<tr>";
echo "<td><img src='itemImages/{$row['imageName']}' width='100'></td>";
echo "<td>".$row['item_name']."</td>";
echo "<td>".$row['price']."</td>";
echo "<td>".$row['usrname']."</td>";
echo "<td>".$row['mobileno']."</td>";

 echo "</tr>";

 }
 echo "<p class='link'><a href='addItem.php'>Add Item to Marketplace</a></p>";
 ?>
 </div>
</body>