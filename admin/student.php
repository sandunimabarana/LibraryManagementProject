<?php
include "connection.php";
include "navbar.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Student Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    .srch{
        padding-left:900px;
    }
    body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  margin-top:80px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle{
  margin-left: 20px;
}
    </style>
</head>
<body>
<!-----------------------------------------------------------sideNav------------------------------>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <div style="color:white; margin-left:80px; font-size;20px;">
                    
        <?php
        if(isset($_SESSION['login_user'])){
            echo "<img class='img-circle profile_img' height=100px width=100px src='libraryImages/".$_SESSION['pic']."' alt=''>";
            echo "<br><br>"; 

            echo " Welcome ".$_SESSION['login_user'];
        }
        ?>
    </div>
  <a href="profile.php">Profile</a>
  <a href="books.php">Books</a>
  <a href="#">Book Request</a>
  <a href="#">Issue Information</a>
</div>

<div id="main">
 
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
    <!--------------------------------search bar------------------------------------------------->
    <div class="srch">
<form action="" class="navbar-form" method="post" name="form1">
    
        <input class="form-control" type="text" name="search" placeholder="Student Username...." required="">
        <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
    <span class="glyphicon glyphicon-search"></span>

        </button>


</form>

    </div>
    <h2>List of Students</h2>
    <?php

    if(isset($_POST['submit'])){
        $q=mysqli_query($db,"SELECT firstname,lastname,username,roll,email,contact FROM student where username like '%$_POST[search]%'");
        if(mysqli_num_rows($q)==0){
            echo "Sorry! No Student Found with that username. Try Searching again.";
        }
    else{
        echo "<table class='table table-bordered table-hover'>";
        echo "<tr style='background-color: #6db6b9e6;'>";
    //Table header
        echo "<th>";  echo "First Name";  echo "</th>";
        echo "<th>";  echo "Last Name";  echo "</th>";
        echo "<th>";  echo "Username";  echo "</th>";
        echo "<th>";  echo "Roll";  echo "</th>";
        echo "<th>";  echo "Email";  echo "</th>";
        echo "<th>";  echo "Contact";  echo "</th>";
    
        echo "</tr>";
    
        while($row=mysqli_fetch_array($q)){
            echo "<tr>";
            echo "<td>"; echo $row['firstname']; echo "</td>";
            echo "<td>"; echo $row['lastname']; echo "</td>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['roll']; echo "</td>";
            echo "<td>"; echo $row['email']; echo "</td>";
            echo "<td>"; echo $row['contact']; echo "</td>";
            
            echo "</tr>";
        }
        echo "</table>";
}
    }
/*if button is not pressed.*/
    else{
        $sql="SELECT firstname,lastname,username,roll,email,contact FROM student ORDER BY student.firstname ASC;";
    $res=mysqli_query($db,$sql);

    echo "<table class='table table-bordered table-hover'>";
    echo "<tr style='background-color: #6db6b9e6;'>";
//Table header
    echo "<th>";  echo "First Name";  echo "</th>";
    echo "<th>";  echo "Last Name";  echo "</th>";
    echo "<th>";  echo "Username";  echo "</th>";
    echo "<th>";  echo "Roll";  echo "</th>";
    echo "<th>";  echo "Email";  echo "</th>";
    echo "<th>";  echo "Contact";  echo "</th>";

    echo "</tr>";

    while($row=mysqli_fetch_array($res)){
        echo "<tr>";
            echo "<td>"; echo $row['firstname']; echo "</td>";
            echo "<td>"; echo $row['lastname']; echo "</td>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['roll']; echo "</td>";
            echo "<td>"; echo $row['email']; echo "</td>";
            echo "<td>"; echo $row['contact']; echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    }

?>
    </body>
</html>