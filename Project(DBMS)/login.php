<?php
$server="localhost";
$username="root";
$password="";
$database="student";
$conn=mysqli_connect($server,$username,$password,$database);
$showerror=false;
$showalert=false;
if(isset($_POST['submit']))
{
$rno=$_POST['rno'];
$pwd=$_POST['pwd'];
if(($rno=="admin")&&($pwd=="admin"))
  header("Location:/Project(DBMS)/special.php");
  else{
$s="select *from signup where rno='$rno'";
$r=mysqli_query($conn,$s);
$a=mysqli_num_rows($r);
if($a>0)
{
  $b=mysqli_fetch_assoc($r);
  session_start();
  $_SESSION['rno']=$rno;
  $_SESSION['loggedin']=true;
  
  if(($b['rno']=="$rno")&&($b['pwd']=="$pwd"))
  header("Location:/Project(DBMS)/welcome.php");
  else{
  $showerror="Paswword is incorrect";
  $_SESSION['loggedin']=true;
  }
}
else
$showalert=true;
  }
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
    width: 500px;
    height: 100px;
  }
  .center{
    text-align: center;
  }
  </style>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/Project(DBMS)/home.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/Project(DBMS)/signup.php">Signup</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<?php
if($showalert)
echo " <div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>Account does not exist or wrong Roll.No!</strong> 
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
?>
<?php
if($showerror)
echo " <div class='alert alert-danger alert-dismissible fade show' role='alert'>
<strong>Error!</strong>.$showerror. 
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
?>
<div class="container  my-4"><h1>Login</h1></div>
    <div class="container">
  <form action="/Project(DBMS)/login.php" method="POST">
  <div class="mb-3 div1">
    <label for="rno" class="form-label">Roll.No</label>
    <input type="text" class="form-control" id="rno" name="rno" aria-describedby="emailHelp">
  </div>
  <div class="mb-3 div1">
    <label for="pwd" class="form-label">Password</label>
    <input type="password" class="form-control" id="pwd" name="pwd">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Login</button>
</form>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>