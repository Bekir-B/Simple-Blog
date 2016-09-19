<html>
<body>
    <?php
        include ('db_services/db_connect.php');
         
        
        $sql = "SELECT * FROM posts";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {


                echo "ID: " .$row["PostID"]. " Title: " .$row["Title"]. "Content:  " .$row["Content"].  " Date Posted: " .$row["DatePosted"]. " UserID: " .$row["UserID"]. "<br>" ;

            }
        }
                else {
                    echo "0 results";
                }
        require('db_services/end_connection.php');
    ?>
</body>
</html>
