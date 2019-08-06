<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nineleaps</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="cdn/bootstrap.min.css">
  <script src="cdn/bootstrap.min.js"></script>
  <script src="cdn/jquery.min.js"></script>
  <script src="cdn/popper.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/jquery.jOrgChart.css"/>
  <link rel="stylesheet" href="css/custom.css"/>
  <link href="css/prettify.css" type="text/css" rel="stylesheet" />

  <script type="text/javascript" src="prettify.js"></script>

  <!-- jQuery includes -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

  <script src="jquery.jOrgChart.js"></script>

  <script>
  jQuery(document).ready(function() {
    $("#org").jOrgChart();
  });
  </script>

</head>
<body>
  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"> <img src="img/logo.jpg" height="50%" width="50%" alt="Nineleaps"></a>
    <div>
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container" style="margin-top:50px;">
    <h2>EMPLOYEE HIERARCHY</h2>
    <hr>
    <?php
    $conn=mysqli_connect("localhost","root","","nineleapsemp");
    if(!$conn){
      die("Connection failed: " . mysqli_connect_error());
    }
    function foo($pid,$conn){
      $li="SELECT name,id,designation from employee where pid=$pid";
      $re=mysqli_query($conn,$li);
      if(mysqli_num_rows($re)==0){
        return;
      }
      echo"<ul>";
        while ($rs=mysqli_fetch_assoc($re)) {
          echo "<li><b><a style=color:#ffffff; href=emp.php?id=$rs[id]>$rs[name]</b></a><small> <br><br>$rs[designation] </small>";
            foo($rs["id"],$conn);
          }
          echo"</li></ul>";
        }
        $q = "SELECT name,designation from employee where id=1";
        $res=mysqli_query($conn, $q);
        if(mysqli_num_rows($res)!=0){
          $res1=mysqli_fetch_object($res);
          echo"<ul id=org style=display:none><li><b><a style=color:#ffffff; href=emp.php?id=1> $res1->name </b></a><small disabled> $res1->designation </small>";
            foo(1,$conn);
            echo "</li></ul>";
          }
          ?>
        </div>
      </body>
      </html>
