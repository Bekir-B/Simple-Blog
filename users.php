<html>
<body>
    <?php
        include ('db_services/db_connect.php');
         
        
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {


                echo "ID: " .$row["UserID"]. " Name: " .$row["Name"]. " " .$row["Surname"]. " Username: ".$row['Username']. " Date Joined: " .$row["DateJoined"]. " E-mail: " .$row["Email"]. "<br>" ;

            }
        }
                else {
                    echo "0 results";
                }
        require('db_services/end_connection.php');
    ?>
</body>
</html>
