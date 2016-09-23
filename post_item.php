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

<?php

    $query4 = "SELECT comments.*, users.Username FROM comments LEFT JOIN users ON comments.UserID = users.UserID WHERE PostID ={$_REQUEST['PostID']}";
    $result4 = mysqli_query ($conn, $query4);
    $num = mysqli_num_rows($result4);
    echo '<div id="comments">';
    echo '<h2>Comments</h2>';
    while($num!=0){
    $row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
    echo '<div class="commentlist">';
    echo 'Username:'.$row4['Username'].'<br>';
    echo $row4['Content'];
    echo'</div>';
    $num--;
     }
    echo'</div>';
   
?>


<?php 
    if (isset($_SESSION["login_user"])){
?>
<div id="postwrap">
<div id="respond">
    <form action="" method="post">
        <textarea name="content" cols="100%" rows="10"></textarea><br>
         <input type="hidden" name="UserID" value="<?php $result2?>" />
         <input type="hidden" name="PostID" value="<?php echo $_REQUEST['PostID']; ?>" />
        <input type="submit" name="submit" value="Submit comment" />
    </form>
    </div>
    </div>


<?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $errors = array();

           if (empty($_POST['content'])) {
                $errors[] = 'You forgot to enter a a comment.';
            } else {
                $content = mysqli_real_escape_string($conn, trim($_POST['content']));
            }

            if (empty($errors)) {
                
                $query2="SELECT UserID FROM users WHERE Username = '{$_SESSION["login_user"]}'";
                $result2=mysqli_query($conn,$query2);
                $row2 = mysqli_fetch_assoc($result2);
                $UID = implode ("",$row2);
                $PID = $_POST['PostID'];

                $query3 = "INSERT INTO comments (Content, PostID, UserID) VALUES ('$content', '$PID', '$UID')"; 
                $result3 = mysqli_query($conn, $query3);
                
            }
      }  }
?>

</div>