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
  <?php
  $conn=mysqli_connect("localhost","root","","nineleapsemp");
  if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
  }
  $vi="Select * From employee where id=$_GET[id]";
  $vi1= mysqli_query($conn,$vi);
  $res=mysqli_fetch_row($vi1);
  echo '<div style="margin-top:100px;" class="container">
    <h2>'.$res[1].'</h2>
    <hr>
    <div class="row">
      <div class="col-md-1">
      </div>
      <div class="col-md-2">
        <label> <h6> Name </h6> </label>
      </div>
      <div class="col-md-6">
        <label> <h6> '.$res[1].' </h6> </label>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1">
      </div>
      <div class="col-md-2">
        <label> <h6> Designation </h6> </label>
      </div>
      <div class="col-md-6">
        <label> <h6> '.$res[2].' </h6> </label>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1">
      </div>
      <div class="col-md-2">
        <label> <h6> Manager </h6> </label>
      </div>
      <div class="col-md-6">
        <label> <h6> '.$res[3].' </h6> </label>
      </div>
    </div>
    <div class="row" style="margin-top:20px;">
      <div class="col-md-1">
      </div>';
      if($res[0]!=1){
      echo '<div class="col-md-2">
        <a class="btnc btn-info" href=update.php?id='.$res[0].'>Edit</a>
      </div>';
    }
    echo '</div>
    <hr>
  </div>';
  ?>
</body>
</html>
