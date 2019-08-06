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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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

  $id1=$_GET["id"];

  $conn=mysqli_connect("localhost","root","","nineleapsemp");
  if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
  }
  $up="Select * From employee where id=$id1";
  $up1= mysqli_query($conn,$up);
  $res1=mysqli_fetch_row($up1);
  echo '
  <div class="container" style="margin-top:100px">
    <h1>Nineleaps Challenge</h1>
    <hr>
    <h3>Update Employee</h3>
    <form class="form-inline" action="" method="post">
      <div class="row">
        <div class="col-lg-4">
          <label for="name">Name </label>
        </div>
        <div class="form-group col-lg-6">
          <input size="50" required type="text" class="form-control" id="name" value='."$res1[1]".' name="name" placeholder="Full Name">
        </div>
        <div class="col-lg-4">
          <label for="desi">Designation </label>
        </div>
        <div class="form-group col-lg-6">
          <input size="50" required type="text" class="form-control" id="desi" value='."$res1[2]".' name="desi" placeholder="Designation">
        </div>
        <div class="col-lg-4">
          <label for="mana">Manager </label>
        </div>
        <div class="form-group col-lg-6">
          <select style="width:76%" class="form-control" name="mana">
            <option value="N.A.">-- Select Reporting Manager --</option>"';
            $sel="select name from employee";
            $nam= mysqli_query($conn,$sel);
            while($na=mysqli_fetch_assoc($nam)){
              echo "<option value=".$na[name].">".$na[name]."</option>";
            }
            echo  '</select>
          </div>
        </div>
        <div style="margin-top:30px;" class="col-md-12">
          <center><button type="submit" class="btnc btn-primary" name="upd">Update</button></center>
        </div>
      </form>
      <hr>
    </div>';
    mysqli_close($conn);

    ?>
    <?php
    if(isset($_POST["upd"])){
      $unm=$_POST["name"];
      $uds=$_POST["desi"];
      $umn=$_POST["mana"];
      $conn=mysqli_connect("localhost","root","","nineleapsemp");
      if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
      }
      $up="UPDATE employee SET name='$unm', designation='$uds', manager='$umn' where id=$id1";
      if (mysqli_query($conn, $up)) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }
    }
    ?>
  </body>
  </html>
