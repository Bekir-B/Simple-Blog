<?php
    session_start();
    
    include ('includes/header.html');
    if (isset($_SESSION['login_user'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        include ('db_services/db_connect.php');
        $Title = $_POST['title'];
        $Content = $_POST['content'];

        $query2="SELECT UserID FROM users WHERE Username = '{$_SESSION["login_user"]}'";
        $result2=mysqli_query($conn,$query2);
        $row = mysqli_fetch_assoc($result2);
        $UserID = implode ("",$row);

        $query = "INSERT INTO posts (Title, Content, UserID) VALUES ('$Title','$Content','$UserID')";
        $result = mysqli_query($conn, $query);
    }
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
         <input type="hidden" name="userID" value="<?php $result2?> " />
        <input type="submit" name="submit" value="Submit post">

    </form>
    </div>
</div>