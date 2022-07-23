
<?php

$server="localhost";
$username="root";
$password="";
$database="student";
$showalert=false;
$showerror=false;
$exists=false;
$conn=mysqli_connect($server,$username,$password,$database);
if(isset($_POST['submit']))
{
  $rollno=$_POST['rno'];
  $password=$_POST['p'];
  
 $cp=$_POST['cp'];

 $a="select * from signup where rno='$rollno'";
 $w=mysqli_query($conn,$a);
 $nr=mysqli_num_rows($w);
 if($nr>0)
 $exists=true;
 else{
 if($password==$cp){
  $sql="insert into signup (rno,pwd) values ('$rollno','$password')";
  $r=mysqli_query($conn,$sql);
  $s="create table $rollno(venue varchar(20),Date date)";
  mysqli_query($conn,$s);
  $showalert=true;
}
else
$showerror="Passwords do not match ";
 }




}






?><!doctype html>
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
    width: 400px;
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
          <a class="nav-link active" aria-current="page" href="/Project(DBMS)/login.php">Login</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<?php
if($showalert)
echo " <div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>Account Succesfully created!</strong> You can now login with your credentials.
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
?>
<?php
if($exists)
echo " <div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>Account exists already!</strong> 
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
<div class="container mx-8 my-4" ><h1> 
    Sign Up
</h1>
</div>
    <form action="/Project(DBMS)/signup.php" method="POST">
        <div class="container">
  <div class="mb-3 div1  ">
    <label for="rno" class="form-label ">RollNo</label>
    <input type="text" class="form-control" id="rno"  name="rno" aria-describedby="emailHelp">
  </div>
  <div class="mb-3 div1">
    <label for="p" class="form-label">Password</label>
    <input type="password" class="form-control" id="p" name="p">
  </div>
  <div class="mb-3 div1">
    <label for="cp" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cp" name="cp">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</div>
</form>
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