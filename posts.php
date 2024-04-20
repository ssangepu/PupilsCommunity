<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Pupils Community</title>
    <link rel="stylesheet" href="styles.css"/>
    <link rel="stylesheet" href="main.css"/>
    <header>
  <div class="container">
    <nav>
    <li><a href="accommodation.php">Accommodation</a>&nbsp;&nbsp;</li>
            <li><a href="pickup.php">Pickup</a>&nbsp;&nbsp;</li>
            <li><a href="posts.php">Posts</a>&nbsp;&nbsp;</li>
            <li><a href="my_items.php">My Items</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
        </ul>
    </nav>   
    </nav>
        
</div>
</header>
</head>
<body>
<div class="form">
<?php
    include("user_session.php");
    require('db.php');
    $query = mysqli_query($db_con,"SELECT users.name, posts.post, posts.phnum from posts join users on users.username=posts.username");
    echo "<table border='1'> 
    <tr>
    <th>Name</th>
    <th>Phone Number</th>
    <th>Post</th>
    </tr>";
    while($row = mysqli_fetch_array($query))
    {
    echo "<tr>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['phnum']."</td>";
    echo "<td>".$row['post']."</td>";
    echo "</tr>";
    }
    echo "<p class='link'><a href='addPosts.php'>Add Post</a></p>";
    echo "</table>";


?>
</div>
</body>
</html>