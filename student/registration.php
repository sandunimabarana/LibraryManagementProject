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
    <title>Registration</title>
   


    <style type="text/css">
  
    section{
        margin-top: -10px;
    }
        </style>

</head>
<body>

                <section>
                        <div class="reg_img">
                                <br>
                                <div class="box2">
                                    
                                    <h1 style="text-align: center; font-size: 35px; font-family: Lucida Console;">Library Management System</h1>
                                    <h1 style="text-align: center; font-size:25px;">User Registration Form</h1><br>
                                    <form name="Registration" action="registration.php" method="post">
                                        
                                        <div class="login">
                                        <input class="form-control" type="text" name="firstname"  placeholder="First Name" required=""> <br>
                                        <input  class="form-control" type="text" name="lastname"  placeholder="Last Name" required=""><br>
                                        <input class="form-control" type="text" name="username"  placeholder="Username" required=""><br>
                                        <input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
                                        <input class="form-control" type="text" name="roll"  placeholder="Roll No" required=""> <br>
                                        <input class="form-control" type="text" name="email"  placeholder="Email" required=""><br>
                                        <input class="form-control" type="text" name="contact"  placeholder="Contact No" required=""><br>
                                        <input class="btn btn-primary" type="submit" name="submit" value="Sign Up" style="color:black; width:90px; height:35px;">
                                    </div>
                                    </form>
                                  
                                   
                                </div>
                
                        </div>
                    </section>
            <?php 
//<!-- Unique -->
                if(isset($_POST['submit'])){
                    $count=0;
                    $sql="SELECT username from student";
                    $result=mysqli_query($db,$sql);

                    while($row=mysqli_fetch_assoc($result)){
                        if($row['username'] ==$_POST['username']){
                            $count=$count+1;
                        }
                    }
                    if($count==0){

                
                    mysqli_query($db,"INSERT INTO student VALUES('','$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[roll]','$_POST[email]','$_POST[contact]','imagesbook.png'); ");
               ?>
               <script type="text/javascript">
               alert("Registration Successfully");
               
               </script>
               <?php
                    }
                    else{
                        ?>
                        <script type="text/javascript">
                        alert("The Username already Exist.");
                        
                        </script>
                        <?php
                    }
                }
            
            ?>
    
</body>
</html>