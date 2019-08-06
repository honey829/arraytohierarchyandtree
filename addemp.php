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

  <script language="javascript" type="text/javascript">

       function onlyAlphabets(e, t) {
           try {
               if (window.event) {
                   var charCode = window.event.keyCode;
               }
               else if (e) {
                   var charCode = e.which;
               }
               else { return true; }
               if (charCode < 33 || (charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                   return true;
               else
                   return false;
           }
           catch (err) {
               alert(err.Description);
           }
       }

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
  <div class="container" style="margin-top:100px">
    <h1>Nineleaps Challenge</h1>
    <hr>
    <h3>Add An Employee</h3>
    <form class="form-inline" action="" method="post">
      <div class="row">
        <div class="col-lg-4">
          <label for="name">Name </label>
        </div>
        <div class="form-group col-lg-6">
          <input size="50" required type="text" class="form-control" id="name" name="name" placeholder="Full Name"onkeypress="return onlyAlphabets(event,this);">
        </div>
        <div class="col-lg-4">
          <label for="desi">Designation </label>
        </div>
        <div class="form-group col-lg-6">
          <input size="50" required type="text" class="form-control" id="desi" name="desi" placeholder="Designation"onkeypress="return onlyAlphabets(event,this);">
        </div>
        <div class="col-lg-4">
          <label for="mana">Manager </label>
        </div>
        <div class="form-group col-lg-6">
          <select style="width:76%" class="form-control" name="mana">
            <option value="na">--Select Reporting Manager--</option>
            <?php
            $conn=mysqli_connect("localhost","root","","nineleapsemp");
            if(!$conn){
              die("Connection failed: " . mysqli_connect_error());
            }
            $sel="select name from employee";
            $nam= mysqli_query($conn,$sel);
            while($na= mysqli_fetch_assoc($nam)){
              echo "<option value=".$na[name].">".$na[name]."</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div style="margin-top:30px;" class="col-md-12">
        <center><button type="submit" class="btnc btn-primary" name="add">Add</button></center>
      </div>
    </form>
    <hr>
  </div>
</body>
</html>

<?php
if(isset($_POST["add"])){
  $name=$_POST["name"];
  $desi=$_POST["desi"];
  $mana=$_POST["mana"];
  $conn=mysqli_connect("localhost","root","","nineleapsemp");
  if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
  }
  if($mana!='na'){
  $qu3="SELECT id from employee where name='$mana'";
  $val=mysqli_query($conn,$qu3);
  $pid=mysqli_fetch_object($val);}
  $qu="INSERT INTO employee(name,designation,manager,pid) VALUES('$name','$desi','$mana','$pid->id')";
  if (mysqli_query($conn,$qu) === TRUE) {
    echo "<script>alert('Record has been added')</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  echo "<meta http-equiv='refresh' content='0'>";
}
?>
