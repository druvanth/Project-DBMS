<?php
$server="localhost";
$username="root";
$password="";
$database="student";
$conn=mysqli_connect($server,$username,$password,$database);
$showalert=false;
if(isset($_POST['submit'])){
session_start();
$_SESSION['loggedin']=true;
$_SESSION['rollno']=$_POST['rollno'];
$r=$_SESSION['rollno'];
$q1="select * from signup where rno='$r'";
$rq1=mysqli_query($conn,$q1);
$nr=mysqli_num_rows($rq1);
if($nr==0)
$showalert=true;
else
header("location:/Project(DBMS)/welcomespecial.php");
}
if(isset($_POST['submit1'])){
  $year=$_POST['year'];
  $branch=$_POST['branch'];
  $date=$_POST['date'];
  session_start();
  $_SESSION['ye']=$year;
  $_SESSION['br']=$branch;
  $_SESSION['da']=$date;
  $_SESSION['loggedin']=true;
  header("location:/Project(DBMS)/info.php");
}






?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <style>
  .div1{
    width: 100px;
    height: 100px;
  }
  .center{
    text-align: center;
  }
  table {
        border-collapse: separate;
        border-spacing: 20px 0;
      }
      th {
        background-color: #4287f5;
        color: white;
      }
      th,
      td {
        width: 75px;
        height: 15px;
        text-align: center;
        border: 1px solid black;
        /* padding: 5px; */
      }
      h2 {
        color: #4287f5;
      }
      select {
   border:0px;
   outline:0px;
}



  
  </style>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/Project(DBMS)/home.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/Project(DBMS)/logout.php">Logout</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
      </ul> -->
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>
<?php
if($showalert)
echo " <div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>Student with that rollno has not signed up to our website</strong> 
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
?>
<div class="container my-4 center">
    <h2><b>Edit student details</b></h2>
</div>
<div class="container my-4">
    <h4>1.See specific students details</h4>
</div>

<div class="container my-2">
<form class="row gy-2 gx-3 align-items-center" action="/Project(DBMS)/special.php" method="POST">
  <!--<div class="col-auto">
    <label class="visually-hidden" for="autoSizingInput">Name</label>
    <input type="text" class="form-control" id="autoSizingInput" placeholder="Jane Doe">
  </div>-->
  <div class="col-auto">
    <label class="visually-hidden" for="autoSizingInputGroup"></label>
    <div class="input-group">
      <div class="input-group-text">R.No</div>
      <input type="text" class="form-control" id="rollno" name="rollno" placeholder="Username">
    </div>
  </div>
  <!--<div class="col-auto">
    <label class="visually-hidden" for="autoSizingSelect">Preference</label>
    <select class="form-select" id="autoSizingSelect">
      <option selected>Choose...</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
  </div>
  <div class="col-auto">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="autoSizingCheck">
      <label class="form-check-label" for="autoSizingCheck">
        Remember me
      </label>
    </div>
  </div>-->
  <div class="col-auto ">
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </div>
</form>
</div>
<div class="container my-4">
    <h4>2.See Info of Students based on</h4>
</div>
<div class="container">
  <form action="special.php" method="post">
  <table>
    <tr>
      <th>Year</th>
      <th>Branch</th>
      <th>Date</th>
    </tr>
    <tr>
          <td class="td">
            <select class="height" name="year">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select"></td>
<td>
  <div class="select"><select name="branch">
    <option value="CS">CS</option>
    <option value="IT">IT</option>
    <option value="ECE">ECE</option>
    <option value="EEE">EEE</option>
    <option value="MECH">MECH</option>
    <option value="CH">CH</option>
    <option value="CV">CV</option>
    <option value="MT">MT</option>
    <option value="MN">MN</option>
</select"></div></td>
<td> 
        <div class="col-sm-12">
          <input type="date" class="form-control select" id="date" name="date">
        </div>
      </td>
</table>
<div class="container mx-10 my-3">
 
    <button type="submit" class="btn btn-primary" name="submit1">Submit</button>
 
    </div>
</form>
</div>
<
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>