<?php
    session_start();
    include('db_services/db_connect.php');

    $action = $_POST["action"];
    if($action=="showcomment"){
        
        $query4 = "SELECT comments.*, users.Username FROM comments LEFT JOIN users ON comments.UserID = users.UserID WHERE PostID = {$_SESSION['PostID']}";
        $result4 = mysqli_query ($conn, $query4);
        $num = mysqli_num_rows($result4);
            while($num!=0){
                $row4 = mysqli_fetch_assoc($result4);
                echo "<li><b>$row4[Username]</b></li>";
                echo "<li><b>&nbsp;&nbsp; - ".$row4['Content']."</b></li>";
                echo "<br>";
                $num--;
            }
        }

    else if($action=="addcomment"){
  

                $query2="SELECT UserID FROM users WHERE Username = '{$_SESSION["login_user"]}'";
                $result2=mysqli_query($conn,$query2);
                $row2 = mysqli_fetch_assoc($result2);
                $UID = implode ("",$row2);
                $PID = $_SESSION['PostID'];
                $contnt = $_POST["contnt"];

                $query3 = "INSERT INTO comments (Content, PostID, UserID) VALUES ('$contnt', '$PID', '$UID')"; 
                $result3 = mysqli_query($conn, $query3);

                
            }

?>


