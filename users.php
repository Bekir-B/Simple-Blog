<html>
<body>
    <?php
        include ('db_connect.php');
        
        
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

<<<<<<< HEAD
                echo "ID: " .$row["UserID"]. " Name: " .$row["Name"]. " " .$row["Surname"]. " Username: ".$row['Username']. " Date Joined: " .$row["DateJoined"]. " E-mail: " .$row["Email"]. "<br>" ;
=======
                echo "ID: " .$row["UserID"]. " Name: " .$row["Name"]. " " .$row["Surname"]. " Date Joined: " .$row["DateJoined"]. " E-mail: " .$row["Email"]. "<br>" ;
>>>>>>> 21b47b1db105b45163cef0bc76a1f7b1b4650ce6
            }
        }
                else {
                    echo "0 results";
                }
        require('end_connection.php');
    ?>
</body>
</html>
