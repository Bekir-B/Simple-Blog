<?php 
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")  {
   if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
    $username=$_POST['username'];
    $password=$_POST['password'];

include ('db_connect.php');

$sql = "SELECT * FROM users WHERE Password='$password' AND Username='$username'";
$result = mysqli_query($conn,$sql);
<<<<<<< HEAD
$count = mysqli_num_rows($result);

if($count != 1){
   echo "Wrong username or password!";
}
else {
    $_SESSION['login_user'] = $username;
    header('Location: homepage.html');
    
=======
//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if($count == 1){
    $_SESSION['login_user'] = $username;
    header('Location: users.php');
}
else {
    $error = "Username or Password is invalid";
>>>>>>> 21b47b1db105b45163cef0bc76a1f7b1b4650ce6
}
 
    
require ('end_connection.php');
}}
 ?>

<form action="" method="post">

    Username:<br>
    <input type="text" name="username"><br>

    Password:<br>
    <input type="text" name="password"><br>

    <input type="submit" name="submit" value="Login">

</form>
