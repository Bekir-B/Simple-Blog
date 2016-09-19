<?php
    session_start();
    
    include ('includes/header.html');
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        include ('db_services/db_connect.php');
        $Title = $_POST['title'];
        $Content = $_POST['content'];
        $UserID = $_POST['userID'];

        $q = "INSERT INTO posts (Title, Content, UserID) VALUES ('$Title','$Content','$UserID')";
        $r = mysqli_query($conn, $q);
        $_SESSION['login_user'] = $UserID;
    }

?>

<div class="container">
    <div id="respond">
    <form action="" method="post">
        <label for="page">Create your post</label><br>
        <label for="title"><small>Title</small></label><br>
        <input type="text" name="title"><br>
        <label for="post"><small>Write your post here</small></label><br>
        <textarea name="content" cols="100%" rows="10"></textarea><br>
         <input type="hidden" name="userID" value="<?php echo $_SESSION['login_user']; ?>" />
        <input type="submit" name="submit" value="Submit post">

    </form>
    </div>
</div>