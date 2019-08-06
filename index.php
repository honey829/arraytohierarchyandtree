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
    <h1>Challenge App</h1>
    <hr>
    <h6 style="margin-top:25px;margin-bottom:25px">Please select one of the three views:</h6>
    <div class="row">
      <div class="col-lg-3" style="display:inline-block;"><a href="table.php"><button class="btnc btn-info" type="button" name="button">Table View</button></a></div>
      <div class="col-lg-3" style="display:inline-block;"><a href="list.php"><button class="btnc btn-info" type="button" name="button">List View</button></a></div>
      <div class="col-lg-3" style="display:inline-block;"><a href="tree.php"><button class="btnc btn-info" type="button" name="button">Tree View</button></a></div>
      <div class="col-lg-3" style="display:inline-block;"><a href="addemp.php"><button class="btnc btn-info" type="button" name="button">Add Employee</button></a></div>
    </div>
    <hr>
  </div>
</body>
</html>
