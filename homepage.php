<?php
    
    session_start();
    include('db_services/db_connect.php');
    include('includes/header.html');
    
?>

<!--############Start of content div############-->
    


        <?php

            $query = "SELECT * FROM posts ORDER BY DatePosted DESC";
            $result = mysqli_query($conn,$query);
            $count = mysqli_num_rows($result);

            if($count > 0){

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                    $news_body = strip_tags($row['Content']);
                    if (strlen($news_body) > 2000) {
                    $stringCut = substr($news_body, 0, 170);
                    // make sure it ends in a word so assassinate doesn't become ass...
                    $news_body = substr($stringCut, 0, strrpos($stringCut, ' ')). '...';
                }
                echo '<div class="wrapper col1">';
                    echo '<div class="post">';
                        echo '<div id=title>';
                             echo '<h2>' . $row['Title'] . '</h2>';
                        echo '</div>';
                        
                        echo '<div id=body>';
                            echo $news_body;
                        echo '</div>';
                    
                        echo '<a href="./post_item.php?PostID='.$row['PostID'].'" class="button">Continue Reading &rarr;</a>';
                        echo '<hr>';
                    echo '</div>';
                     echo'</div>';
                                         
            }}
            
        ?>




