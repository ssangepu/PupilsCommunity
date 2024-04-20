<?php

    #$db_con = mysqli_connect("127.0.0.1","root","","PupilsCommunity");
    $active_group = 'default';
    $query_builder = TRUE;
    echo "I am calling too";
    $db_con = mysqli_connect("us-cluster-east-01.k8s.cleardb.net","bba71168bcdd8d","8eb15c30","heroku_0a22cdb987db64a");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
