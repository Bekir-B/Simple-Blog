<?php
    session_start();

    include('db_services/db_connect.php');
    include('includes/header.html');

    $query = "SELECT * FROM posts WHERE PostID={$_REQUEST['PostID']}";
    $result = mysqli_query ($conn, $query); // Run the query.
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $title=$row['Title'];
    echo '<h1>'.$title.'</h1>';
    $content=$row['Content'];
    echo '<p>'.$content.'</p>';
?>