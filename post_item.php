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
    if (isset($_SESSION["login_user"])){
?>
<div class="postwrap">
<div id="respond">
    <form action="" method="post">
        <textarea name="content" cols="100%" rows="10"></textarea><br>
         <input type="hidden" name="UserID" value="<?php $result2?>" />
         <input type="hidden" name="PostID" value="<?php echo $_REQUEST['PostID']; ?>" />
        <input type="submit" name="submit" value="Submit comment" />
    </form>
    </div>
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
                $row = mysqli_fetch_assoc($result2);
                $UID = implode ("",$row);
                $PID = $_POST['PostID'];

                $query3 = "INSERT INTO comments (Content, PostID, UserID) VALUES ('$content', '$PID', '$UID')"; 
                $result3 = mysqli_query($conn, $query3);
                
            }
      }  }
?>