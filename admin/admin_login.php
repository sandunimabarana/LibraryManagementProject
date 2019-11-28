<?php
include "connection.php";
include "navbar.php";

session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    

    <style type="text/css">
    section{
        margin-top: -20px;
    }
    </style>

</head>
<body>

    <section>
        <div class="log_img">
                <br/>
                <div class="box1">
                    
                    <h1 style="text-align: center; font-size: 35px; font-family: Lucida Console;">Library Management System</h1><br/>
                    <h1 style="text-align: center; font-size:25px;">Admin Login Form</h1>
                    <form name="login" action="admin_login.php" method="post">
                        
                        <div class="login">
                        <input class="form-control" type="text" name="username"  placeholder="Username" required=""> <br>
                        <input  class="form-control"type="password" name="password" placeholder="Password" required=""> <br>
                        <input class="btn btn-primary" type="submit" name="submit" value="Login" style="color:black; width:70px; height:30px;">
                    </div>
                    </form>
                    <p style="color:white; padding-left: 20px;">
                        <br><br>
                        <a style="color:white;" href="update_password.php">Forgot Password?</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        New to this website? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:white;" href="registration.html">Sign Up</a>
                    </p>
                   
                </div>

        </div>
    </section>
    <footer>
        <p style="color:white; text-align: center;">
            <br>
            Email:&nbsp; Online.library@gmail.com <br><br>
            Mobile:&nbsp; +880171*****
        </p>
    </footer>  
    <?php
        if(isset($_POST['submit'])){

            $count=0;
            $Email=$_POST['username'];
            $Password=$_POST['password'];
           // $encriptpassword=md5($Password);
            mysqli_select_db($db,"libraryNew");
            $res=mysqli_query($db,"select * from admin where email='".$Email."' && password='".$Password."'");

            $row= mysqli_fetch_assoc($res);
            $count=mysqli_num_rows($res);

            if($count>0){
                ?>
                <script type="text/javascript">
                        alert("The Username and Password doesn't match.");
                        
                        </script>
                
                        <!--
                        <div class="alert alert-warning" style="width:700px; margin-left: 300px;">
                        <strong>The Username and Password doesn't match.</strong>
                        </div>
                        -->
                <?php
            }
            else{

                /*------------------------------If username and password matches-------------------------*/

                $_SESSION['login_user'] = $_POST['username'];
                $_SESSION['pic'] = $row['pic'];
                
                ?>
                <script type="text/javascript">
                        
                        window.location="index.php"
                        </script>
                       
                <?php
            }
        }
    ?>
</body>
</html>