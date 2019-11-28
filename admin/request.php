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
    <title>Book Request</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    .srch{
        padding-left:1000px;
    }
    body {
        background-image:url("libraryImages/today4.jpg");
        background-repeat: no-repeat;
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
.container{
    height:700px;
    background-color:black;
    opacity: .6;
    color:white;
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
  <a href="books.php">Books</a>
  <a href="request.php">Book Request</a>
  <a href="issue_info.php">Issue Information</a>
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
<br>
<div class="container"><br>
<h3 style="text-align: center;">Request of Book</h3>
<?php

    if(isset($_SESSION['login_user'])){
        $sql="SELECT student.username,roll,books.bid,name,authors,eddition,status from student inner join issue_book ON student.username=issue_book.username inner join books on issue_book.bid=books.bid where issue_book.approve =''";
        $res=mysqli_query($db,$sql);
        if(mysqli_num_rows($res)==0){
            echo "<br>";
            echo "<h2 style='color:white;'><b>";
            echo "There's No Pending Request..";
            echo "</h2></b>";
        }
        else{
            echo "<table class='table table-bordered'>";
        echo "<tr style='background-color: white;'>";
    //Table header
        echo "<th>";  echo "Student Username";  echo "</th>";
        echo "<th>";  echo "Roll NO";  echo "</th>";
        echo "<th>";  echo "Book ID";  echo "</th>";
        echo "<th>";  echo "Book Name";  echo "</th>";
        echo "<th>";  echo "Authors Name";  echo "</th>";
        echo "<th>";  echo "Eddition";  echo "</th>";
        echo "<th>";  echo "Status";  echo "</th>";
    
        echo "</tr>";
    
        while($row=mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td style=' color:white;'>"; echo $row['username']; echo "</td>";
            echo "<td style='color:white;'>"; echo $row['roll']; echo "</td>";
            echo "<td style='color:white;'>"; echo $row['bid']; echo "</td>";
            echo "<td style='color:white;'>"; echo $row['name']; echo "</td>";
            echo "<td style='color:white;'>"; echo $row['authors']; echo "</td>";
            echo "<td style='color:white;'>"; echo $row['eddition']; echo "</td>";
            echo "<td style='color:white;'>"; echo $row['status']; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        }
    }
    else{
        ?>
        <br><br>
        <h3><b>
        Please Login First to see the request information.
        </b></h3>
        <?php
    }
?>
</div>
</body>
</html>