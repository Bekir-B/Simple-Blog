
<?php 
if ( isset($_POST['submit'])) {
    include('db_connect.php');
        $Username=$_POST['username'];
        $Password=$_POST['password'];
        $Password2=$_POST['password2'];
        $Name=$_POST['name'];
        $Surname=$_POST['surname'];
        $Email=$_POST['email'];

        $sql = "SELECT * FROM users WHERE Username = '$Username'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);


        if (mysqli_num_rows($result) > 0)

        if(count(array_filter($_POST))!=count($_POST)){
            echo "You didn't fill all the fields!";
                }
        
        elseif($count >= 1){
                echo "That username is already taken!";
        }

        elseif ($Password==$Password2){
        $conn->query("INSERT INTO users (Username, Password, Name, Surname, Email) VALUES('$Username', '$Password', '$Name', '$Surname', '$Email')", 1);
        header('Location: users.php');
        }

        else {
           echo "Passwords must match!";
        }
        require ('end_connection.php');
    
}
?>
<form action="" method="post">
    <ul>
        <li>
            Username:<br>
            <input type="text" name="username">
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
            <input type="text" name="name">
        </li>
        <li>
            Surname:<br>
            <input type="text" name="surname">
        </li>
        <li>
            Email:<br>
            <input type="text" name="email">
        </li>
            <input type="submit" name ="submit" value="Register"> 
    </ul>

</form>
