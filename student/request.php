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
<?php
if(isset($_SESSION['login_user'])){
        $q=mysqli_query($db,"SELECT * FROM issue_book where username ='$_SESSION[login_user]';");
        if(mysqli_num_rows($q)==0){
            echo "There's No Pending Request..";
        }
    else{
        echo "<table class='table table-bordered table-hover'>";
        echo "<tr style='background-color: #6db6b9e6;'>";
    //Table header
        echo "<th>";  echo "Book-ID";  echo "</th>";
        echo "<th>";  echo "Aprove Status";  echo "</th>";
        echo "<th>";  echo "Issue Date";  echo "</th>";
        echo "<th>";  echo "Return Date";  echo "</th>";
    
        echo "</tr>";
    
        while($row=mysqli_fetch_array($q)){
            echo "<tr>";
            echo "<td>"; echo $row['bid']; echo "</td>";
            echo "<td>"; echo $row['approve']; echo "</td>";
            echo "<td>"; echo $row['issue_date']; echo "</td>";
            echo "<td>"; echo $row['return_date']; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
}
    }
    else{
        echo "<br><br>";
        echo "<h2><b>";
        echo "Please Login First to see the request information.";
        echo "</b></h2>";
    }
?>
</body>
</html>