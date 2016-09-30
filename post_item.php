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
       <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
                     function showComment(){
                      $.ajax({
                        type:"post",
                        url:"comments.php",
                        data:"action=showcomment",
                        success:function(data){
                             $("#commentslist").html(data);
                        }
                      });
                    }
                
                    showComment();
                    

                    $("#button").click(function(){

                          var contnt=$("#text").val();
                          var pid = $("#pid").val();
                          var uid = $("#uid").val();
                          
                          $.ajax({
                              type:"post",
                              url:"comments.php",
                              data: "&contnt="+contnt+"&PostID"+pid+"&UserID"+uid+"&action=addcomment",
                              success:function(data){
                                showComment();
                                
                              }
                                    
                          });
                          $("#text").val('');
                    });
               });
    </script>
</head>
<body>
                <div class="wrapper">
                <?php
                    $postid = $_REQUEST['PostID'];
                    $_SESSION['PostID'] = $postid;
                    $query = "SELECT * FROM posts WHERE PostID=$postid";
                    $result = mysqli_query ($conn, $query); 
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $postID = $_REQUEST['PostID'];
                    echo '<div id="item">';
                    $title=$row['Title'];
                    echo '<h1>'.$title.'</h1>';
                    $content=$row['Content'];
                    echo '<p>'.$content.'</p>';
                    echo'</div>';
                ?>

                <div id="comments">
                    <h2>Comments</h2>
                    <ul id="commentslist">
                    </ul>
                </div>
                <?php 
                    if (isset($_SESSION["login_user"])){

                ?>
                    <div id="postwrap">
                        <div id="respond">

                            <form>
                                <textarea name="contnt" cols="100%" rows="10" id="text" ></textarea><br>
                                <input type="hidden" name="UserID" id="uid" value="<?php $result2?>" />
                                <input type="hidden" name="PostID" id="pid" value="<?php echo $postid; ?>" />
                                <input type="button" value="Submit comment" id="button"/>
                            </form>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>

</body>
</html>
