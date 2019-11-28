<?php
include "connection.php";
include "navbar.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Change Password</title>
    <style>
    body{
        background-image: url("libraryImages/books-closeup.jpg");
        height:650px;
        background-repeat:no-repeat;
    }
    .wrapper{
        width:400px;
        height:400px;
        margin: 100px auto;
        background-color:black;
        opacity:.8;
        color:white;
        padding:27px 15px;
    }
.form-control{
    width:300px;
}

    </style>
</head>
<body>
    <div class="wrapper">
    <div style="text-align: center;">
    <h1 style="text-align: center; font-size: 35px; font-family: Lucida Console;">Change Your Password</h1><br/>
    </div>
    <div style="padding-left:40px;">
    <form action="" method="post">
        <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
        <input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
        <input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
        <button class="btn btn-success" name="submit" type="submit">Update</button>
    
    </form>
    </div>
    </div>
    <?php
        if(isset($_POST['submit'])){

        if(mysqli_query($db,"UPDATE admin SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]' ;")){

            ?>
            <script type="text/javascript">
                        alert("The Password updated Successfully.");
                        
                        </script>
            <?php
        }
        }
    ?>
</body>
</html>