<?php
    
    session_start();
    include('db_connect.php');
    echo "This is the homepage"."<br>";
     if(isset($_SESSION['login_user'])){
         echo "Welcome " .$_SESSION['login_user']."<br>";
         echo "<a href=\"logout.php\">Logout</a>";
     }

     elseif(!isset($_SESSION['login_user'])){
         echo "<a href=\"registration.php\">Register here</a>"."<br>"; 
         echo "<a href=\"login.php\">Login here</a>";
     }
     if ( isset($_POST['submit'])){
         header('Location: logout.php');

     }
    
?>
