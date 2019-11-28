<?php 

include "connection.php";
include "navbar.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Profile</title>
    <style>
    .wrapper{
        width:400px;
        margin: 0 auto;
        color:white;
    }
    .container{
        color:white;  
    }
    </style>
</head>
<body style="background-color:#004528;">
    <div class="container">
    <form action="" method="post">
    <button class="btn btn-success" style="float:right; width:70px;" name="submit1">
    Edit
    </button>
    
    </form>
    <div class="wrapper">
    <?php
    $q=mysqli_query($db,"SELECT * FROM admin where username='$_SESSION[login_user]';");
    ?>
    <h2 style="text-align:center;">My Profile</h2>
    <?php
        $row=mysqli_fetch_assoc($q);
        echo "<div style='text-align:center;'>
        <img class='img-circle profile-img' height=110 width=120 src='libraryImages/".$_SESSION['pic']."'></div>";
    ?>
    <div style="text-align:center;"><b>Welcome</b>
    <h4>
    <?php
    echo $_SESSION['login_user'];
    ?>
    </h4>
    
    </div>
    <?php
    
        echo "<table class='table table-bordered'>";

        echo "<tr>";
        echo "<td>";
            echo "<b> First Name: </b>";
        echo "</td>";
        echo "<td>";
            echo $row['firstname'] ;
        echo "</td>";
        echo "</tr>";
        
        echo "<tr>";
        echo "<td>";
        echo "<b> Last Name: </b>";
        echo "</td>";
        echo "<td>";
        echo $row['lastname'] ;
        echo "</td>";
        echo "</tr>";
       
        
        echo "<tr>";
        echo "<td>";
        echo "<b> Username: </b>";
        echo "</td>";
        echo "<td>";
        echo $row['username'] ;
        echo "</td>";
        echo "</tr>";
        
        echo "<tr>";
        echo "<td>";
        echo "<b> Password: </b>";
        echo "</td>";
        echo "<td>";
        echo $row['password'] ;
        echo "</td>";
        echo "</tr>";
        
        echo "<tr>";
        echo "<td>";
        echo "<b> Email: </b>";
        echo "</td>";
        echo "<td>";
        echo $row['email'] ;
        echo "</td>";
        echo "</tr>";
        
        echo "<tr>";
        echo "<td>";
        echo "<b> Contact: </b>";
        echo "</td>";
        echo "<td>";
        echo $row['contact'] ;
        echo "</td>";
        echo "</tr>";

        echo "</table>";
        
    ?>

    </div>
    </div>
</body>
</html>