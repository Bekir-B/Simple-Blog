<?php
    
    session_start();
    include('db_connect.php');
    echo "This is the homepage"."<br>";
     if(isset($_SESSION['login_user'])){
         echo "Welcome " .$_SESSION['login_user']."<br>";
         echo "<a href=\"logout.php\">Logout</a>";
     }
     if ( isset($_POST['submit'])){
         header('Location: logout.php');
     }
    
?>
