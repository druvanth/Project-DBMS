
<?php
$server="localhost";
$username="root";
$password="";
$database="student";
$conn=mysqli_connect($server,$username,$password,$database);

$showalert=false;
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true)
header("location: /Project(DBMS)/login.php");
else
$r=$_SESSION['rollno'];

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
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/Project(DBMS)/logout.php">Truncate</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

      <div class="container center my-4"><h1> History of Journey</h1>
      
  <table class="table">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Venue</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
     <?php
     
     $q="select * from $r";
     $c=mysqli_query($conn,$q);
     $sno=0;
     while($r=mysqli_fetch_assoc($c)){
     
     $sno=$sno+1;
     echo"
     <tr>
      <th scope='row'>$sno</th>
      <td>".$r['venue']."</td>
      <td>".$r['Date'] ."</td>
    </tr>";
     }
     
     
     ?>
  </tbody>
</table>

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