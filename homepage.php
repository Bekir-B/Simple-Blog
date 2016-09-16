<?php
    
    session_start();
    include('db_services/db_connect.php');
    
    echo "This is the homepage"."<br>";
     if(isset($_SESSION['login_user'])){
         echo "Welcome " .$_SESSION['login_user']."<br>";
         echo "<a href=\"logout.php\">Logout</a>";
     }
 
     elseif(!isset($_SESSION['login_user'])){
         include('includes/header.html');
     }
     if ( isset($_POST['submit'])){
         header('Location: logout.php');

     }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
</head>
<body>
    
</body>
</html>