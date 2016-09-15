
<?php 
if ( isset($_POST['submit'])) {
    include('db_connect.php');
        $Username=$_POST['username'];
        $Password=$_POST['password'];
        $Name=$_POST['name'];
        $Surname=$_POST['surname'];
        $Email=$_POST['email'];

        $conn->query("INSERT INTO users (Username, Password, Name, Surname, Email) VALUES('$Username', '$Password', '$Name', '$Surname', '$Email')", 1);
        
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
            name:<br>
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