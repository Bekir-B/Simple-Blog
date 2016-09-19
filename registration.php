
<?php 
session_start();
if ( isset($_POST['submit'])) {
    include('db_services/db_connect.php');
        $Username=$_POST['username'];
        $Password=$_POST['password'];
        $Password2=$_POST['password2'];
        $Name=$_POST['name'];
        $Surname=$_POST['surname'];
        $Email=$_POST['email'];

        $sql = "SELECT * FROM users WHERE Username = '$Username'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);


        if(count(array_filter($_POST))!=count($_POST)){
            echo "You didn't fill all the fields!";
                }
        
        elseif($count >= 1){
                echo "That username is already taken!";
        }

        elseif ($Password==$Password2){
        $conn->query("INSERT INTO users (Username, Password, Name, Surname, Email) VALUES('$Username', '$Password', '$Name', '$Surname', '$Email')", 1);
        $_SESSION['login_user'] = $Username;
        header('Location: homepage.php');
        }
 
        else {
           echo "Passwords must match!";
        }
        
}
require ('db_services/end_connection.php');
?>
<form action="" method="post">
    <ul>
        <li>
            Username:<br>
            <input type="text" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
        </li>
        <li>
            Password:<br>
            <input type="password" name="password">
        </li>
        <li>    
            Confirm password:<br>
            <input type="password" name="password2">
        </li>
        <li>
            Name:<br>
            <input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
        </li>
        <li>
            Surname:<br>
            <input type="text" name="surname" value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>">
        </li>
        <li>
            Email:<br>
            <input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
        </li>
            <input type="submit" name ="submit" value="Register"> 
    </ul>

</form>
