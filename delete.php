<?php
    $id=$_GET['id'];
    include('db.php');
    $result = mysqli_query($db_con, "SELECT * from `marketplace` where item_id='$id'");
    $row=mysqli_fetch_array($result);
    unlink("itemImages/".$row['imageName']);
    mysqli_query($db_con,"delete from `marketplace` where item_id='$id'");
    echo "<div class='form'>
    <h3>Deleted succesfully</h3><br/>
    <p class='link'><a href='user_home.php'>Home</a></p>
    </div>";
?>