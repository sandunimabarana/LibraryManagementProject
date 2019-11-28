<?php
include "connection.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Feedback</title>
    <style type="text/css">
        body{
            background-image: url("libraryImages/princeton.jpg");
        }
        .wrapper{
            padding:20px;
            margin:0px auto;
            width:900px;
            height:600px;
            background-color:black;
            opacity: .8;
            color:white;
        }
        .form-control{
            height:70px;
            width:60%;
        }
        .scroll{
            width=100%;
            height:300px;
            overflow:auto;
            color:white;
        }
    </style>
</head>
<body>
    <div class="wrapper">
    <h4>If You have any suggesioons or questions comment below.</h4>
    <form style="" action="" method="post">
    <input class="form-control" type="text" name="comment" placeholder="Write something..."> <br>
    <input class="btn btn-success" type="submit" name="submit" value="Comment" style="width=80px; height:40px;">
    </form>
    
    <div class="scroll" style="font-color:white;">
    <?php
        if(isset($_POST['submit'])){

            $sql="INSERT INTO comments VALUES('','$_POST[comment]');";
           if( mysqli_query($db,$sql)){

            $q="SELECT 8 FROM comments ORDER BY comments.'id' DESC";
            $res=mysqli_query($db,$q);
            echo "<table class='table table-bordered'>";
            while($row=mysqli_fetch_array($res)){

                echo "<tr>";
                    echo "<td>"; echo $row['comment']; echo "</td>";
                echo "</tr>";
            }
            
           }
        }
        else{
            
            $q="SELECT * FROM comments ORDER BY comments.id DESC";
            $res=mysqli_query($db,$q);
            echo "<table class='table table-bordered'>";
            while($row=mysqli_fetch_array($res)){

                echo "<tr>";
                    echo "<td>"; echo $row['comment']; echo "</td>";
                echo "</tr>";
            }
            
        }
    ?>
    </div>
    </div>
</body>
</html>