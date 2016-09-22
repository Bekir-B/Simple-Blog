<?php
    
    session_start();
    include('db_services/db_connect.php');
    include('includes/header.html');
    
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<div class="wrapper">
        <?php


            $query = "SELECT posts.*, users.Username FROM posts LEFT JOIN users ON posts.UserID = users.UserID ORDER BY DatePosted DESC";
            $result = mysqli_query($conn,$query);
            $count = mysqli_num_rows($result);


            if($count > 0){

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                    $news_body = strip_tags($row['Content']);
                    if (strlen($news_body) > 2000) {
                    $stringCut = substr($news_body, 0, 2000);
                    // make sure it ends in a word so assassinate doesn't become ass...
                    $news_body = substr($stringCut, 0, strrpos($stringCut, ' ')). '...';
                }
                echo '<div class="col1">';
                    echo '<div class="post">';
                        echo '<div id=title>';
                             echo '<h2>' . $row['Title'] . '</h2>';
                        echo '</div>';
                        echo'<div id="info"><i class="material-icons md-18">person </i> Username: ' .$row['Username'].'&nbsp <i class="material-icons md-18"> date_range</i> Date posted: '.$row['DatePosted'].'</div>';
                        echo '<div id=body>';
                            echo $news_body;
                        echo '</div>';
                        echo '<a href="./post_item.php?PostID='.$row['PostID'].'" class="button">Continue Reading &rarr;</a>';
                        echo '<hr>';
                    echo '</div>';
                     echo'</div>';
                                         
            }}
            
            
        ?>

</div>



