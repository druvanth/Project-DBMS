<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "student";
$showalert = false;
$showalert1 = false;
$showalert2=false;
$sa=false;
$conn = mysqli_connect($server, $username, $password, $database);
if (isset($_POST['submit'])) {
  $username = $_POST['name'];
  $year = $_POST['year'];
  $date = $_POST['date'];
  $rollno = $_POST['roll'];
  $reason = $_POST['j'];

  $b = "select * from signup where rno='$rollno'";
  $c = mysqli_query($conn, $b);
  $nro = mysqli_num_rows(($c));
  if ($nro > 0) {
    $q1 = "select status from app where sn=(select ssn from application where date='$date' and ro='$rollno')";
    $rq1 = mysqli_query($conn, $q1);
    $r = mysqli_num_rows($rq1);
    if ($r > 0) {
      $fq1 = mysqli_fetch_assoc($rq1);
      if($fq1['status']==='granted'){
      $sql = "insert into info (name,Year_of_study,rollno,venue) values ('$username','$year','$rollno','$reason')";
      mysqli_query($conn, $sql);
      $sql1 = "insert into $rollno values('$reason','$date')";
      mysqli_query($conn, $sql1);
      $showalert1 = true;
      }
      else{
        $sa=true;
      }
    } else {
      $showalert2 = true;
    }
  } else
    $showalert = true;
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="home.css">
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:700' rel='stylesheet'>
  <title>Hello, world!</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/Project(DBMS)/signup.php">Signup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/Project(DBMS)/login.php">Login</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <?php
  if ($showalert)
    echo " <div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>You have not signed up to our website!</strong> Please sign up before filling the details
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";


  ?>
   <?php
  if ($sa)
    echo " <div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>Your Application has not been granted permission!</strong> Please take permission granted status to proceed
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";


  ?>
  <?php
  if ($showalert1)
    echo " <div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>Submitted successfully!</strong> Have a safe Journey
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";


  ?>
 <?php
  if ($showalert2)
  echo " <div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>You have not applied for leave !</strong> 
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";

  ?>


  <style>
    .div1 {
      width: 100px;
      height: 100px;
    }

    .center {
      text-align: center;
    }

    .colour {
      border: 3px pink;
    }
  </style>

  <div class="container center my-4 colour">
    <h1> Enter the details </h1>
  </div>
  <div class="container colour">
   
  </div>
  <h1></h1>
  <div class="container">
        <div class="myCard">
            <div class="row">
                <div class="col-md-8">
                    <div class="myLeftCtn"> 
                    <form action="/Project(DBMS)/home.php" method="POST">
      <div class="row mb-3 my-4 ">
        <label for="name" class="col-sm-2 col-form-label"><b>Name:</b></label>
       
        <div class="col-sm-10 ">
        
          <input type="text" class="form-control " id="name" name="name">
        </div>
      </div>
      <div class="row mb-3 ">
        <label for="roll" class="col-sm-2 col-form-label"><b>Roll.No:</b></label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="roll" name="roll">
        </div>
      </div>
      <div class="row mb-3">
        <label for="year" class="col-sm-2 col-form-label"><b>Year of Study:</b></label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="year" name="year">
        </div>
      </div>
      <div class="row mb-3">
        <label for="date" class="col-sm-2 col-form-label"><b>Date of leaving:</b></label>
        <div class="col-sm-10">
          <input type="date" class="form-control" id="date" name="date">
        </div>
      </div>
      <!-- <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Journey for</legend>

   <div class="col-sm-10">
      <div class="form-check">
        <input type="radio" id="going" name="going" >
        <label for="going">Going to campus</label><br>
        <input type="radio" id="goinf" name="going" >
        <label for="going">Leaving from campus</label><br>
</div>

      
  </fieldset>-->
      <div class="row mb-3">
        <label for="j" class="col-sm-2 col-form-label"><b>Journey to:</b></label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="j" name="j">
        </div>
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="myRightCtn">
                            <div class="box"><header>About the Form</header>
                            
                            <p>The form collect user information before going for a journey from college.It also allows user to keep track of his/her journey details.</p>
                            </div>
                                
                    </div>
                </div>
            </div>
        </div>
</div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>