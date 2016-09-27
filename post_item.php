<?php
    session_start();

    include('db_services/db_connect.php');
    include('includes/header.html');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
<body>
    
<div class="wrapper">
<?php
    $query = "SELECT * FROM posts WHERE PostID={$_REQUEST['PostID']}";
    $result = mysqli_query ($conn, $query); // Run the query.
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo '<div id="item">';
    $title=$row['Title'];
    echo '<h1>'.$title.'</h1>';
    $content=$row['Content'];
    echo '<p>'.$content.'</p>';
    echo'</div>';
?>


<div id="comments">
<h2>Comments</h2>
<div class="commentlist">
    
    <?php
    require('comments.php');
    ?>

</div></div>
<script type="text/javascript">
        $(document).ready(function() {

            $("#button").click(function(e) {                
                e.preventDefault();
                $.ajax({   
            
                    type: "GET",
                    url: "comments.php",    
                    dataType: "html",                
                    success: function(response){                    
                        $("#comments").html(response); 
                    }
                });
            });
    });

</script>
</div>

</body>
</html>