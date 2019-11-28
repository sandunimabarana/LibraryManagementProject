<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
            
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                        
                            
                        <span class="navbar-text">
                    <a class="navbar-brand">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
                </span>
                    
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="index.php">HOME</a></li>
                <li class="nav-item active"><a class="nav-link" href="books.php">BOOKS</a></li> 
                <li class="nav-item active"><a class="nav-link" href="feedback.php">FEEDBACK</a></li>
            </ul>

            <?php
            if(isset($_SESSION['login_user'])){
                ?>
               <li class="nav-item active"><a class="nav-link" href="profile.php">PROFILE</a></li>
                <li><a href="">
                <div style="color:white;">
                <?php
                echo "<img class='img-circle profile_img' height=30px width=50px src='libraryImages/".$_SESSION['pic']."' alt=''>";
                echo " ".$_SESSION['login_user'];
                ?>
                </div>
                
                </a></li>
                <li class="nav-item active"><a class="nav-link" href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
            <?php
            }else{
                ?>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="student_login.php"> <span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                <li class="nav-item active"><a class="nav-link" href="registration.php"> <span class="glyphicon glyphicon-user">SIGN UP</span></a></li>
        </ul>
           <?php
            }
            
            ?>
           
        
            </nav>
    
</body>
</html>