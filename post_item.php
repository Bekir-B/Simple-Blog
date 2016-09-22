<?php
    session_start();

    include('db_services/db_connect.php');
    include('includes/header.html');
?>
<div class="wrapper">
<?php
    $query = "SELECT * FROM posts WHERE PostID={$_REQUEST['PostID']}";
    $result = mysqli_query ($conn, $query); // Run the query.
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo '<div id="item">';
    $title=$row['Title'];
    echo '<h1>'.$title.'</h1>';
    $content=$row['Content'];
    echo '<p>'.$content.'</p>';
    echo'</div>';
?>

<div id="respond">
    <form action="" method="post">
        <textarea name="content" cols="100%" rows="10"></textarea><br>
         <input type="hidden" name="userID" value="" />
        <input type="submit" name="submit" value="Submit comment" />

    </form>
    </div>
</div>