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
  <script>

  </script>
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
  <div style="margin-top:100px;" class="container">
    <h2>ALL Employees</h2>
    <table style="margin-top:30px;" class="table table-bordered">
      <thead>
        <tr>
          <th>E.ID</th>
          <th>Name</th>
          <th>Designation</th>
          <th>Manager</th>
          <th>View</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $conn=mysqli_connect("localhost","root","","nineleapsemp");
        if(!$conn){
          die("Connection failed: " . mysqli_connect_error());
        }
        $qu2="Select * From employee";
        $all= mysqli_query($conn,$qu2);
        while($all1=mysqli_fetch_assoc($all)){
          echo"<tr>
            <td>".$all1["id"]."</td>
            <td>".$all1["name"]."</td>
            <td>".$all1["designation"]."</td>
            <td>".$all1["manager"]."</td>
            <td><a href=emp.php?id=".$all1["id"].">View</a></td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
