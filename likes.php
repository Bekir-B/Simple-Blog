<?php
    session_start();
    include('db_services/db_connect.php');

    $action = $_POST['action'];
    if($action=="showlikes"){
    $query2 = "SELECT count(*) FROM likes WHERE likes.PostID = {$_SESSION['PostID']}";
    $result2 = mysqli_query($conn, $query2);
    $num = mysqli_num_rows($result2);
    
    echo $num;
 }
?>