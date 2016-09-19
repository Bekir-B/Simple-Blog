<?php 
session_start();
include ('db_services/db_connect.php');

if($_SERVER["REQUEST_METHOD"] == "POST")  {
   if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else 
{
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM users WHERE Password='$password' AND Username='$username'";


$result = mysqli_query($conn,$sql);

$count = mysqli_num_rows($result);

if($count != 1){
   echo "Wrong username or password!";
}
else {
    $_SESSION['login_user'] = $username;
    header('Location: homepage.php');
    
}    
require ('db_services/end_connection.php');
}}
 ?>

<form action="" method="post">

    Username:<br>
    <input type="text" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"><br>

    Password:<br>
    <input type="password" name="password"><br>

    <input type="submit" name="submit" value="Login">

</form>
