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
  <style>
  .btnc {
    padding: 14px 24px;
    border: 0 none;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    background-color: #02183a;
    border-radius:0;
  }
  .btnc:hover{
    background-color: #021824;
  }
  </style>
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
  <div class="container" style="margin-top:100px">
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
        echo "<li><b><a style=color:#0c2856; href=emp.php?id=$rs[id]>$rs[name]</b></a><small> $rs[designation] </small> </li>";
        foo($rs["id"],$conn);
      }
      echo"</ul>";
    }
    $q = "SELECT name,designation from employee where id=1";
    $res=mysqli_query($conn, $q);
    if(mysqli_num_rows($res)!=0){
      $res1=mysqli_fetch_object($res);
      echo"<ul><li><b><a style=color:#0c2856; href=emp.php?id=1> $res1->name </b></a><small disabled> $res1->designation </small> </li>";
        foo(1,$conn);
        echo "</ul>";
      }
      ?>
      <hr>
    </div>
  </body>
  </html>
