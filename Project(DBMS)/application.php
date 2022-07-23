<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
    header("location: /Project(DBMS)/login.php");
else
    $y = $_SESSION['rno']
?>
<?php
$showalert = false;
$showerror = false;
if (isset($_POST['submit'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "student";
    $conn = mysqli_connect($server, $username, $password, $database);
    $username = $_POST['name'];
    $rno = $_POST['rno'];
    $yr = "$rno[0]";
    $yr .= "$rno[1]";
    $yr .= "$rno[2]";
    $ye=1;
    if ($yr == '201')
        $ye = 2;
    else 
    if ($yr == '191')
        $ye = 3;
    elseif ($yr == '181')
        $ye = 4;
    $date = $_POST['date'];
    $venue = $_POST['venue'];
    $hn = $_POST['hn'];
    $hno = $_POST['hrn'];
    $reason = $_POST['reason'];
    if ($rno != $y)
        $showerror = true;
    else {
        $q = "select * from application where ro='$rno' and date='$date'";
        $e = mysqli_query($conn, $q);
        if (mysqli_num_rows($e) > 0)
            $showalert = true;
        else {
            $r = "insert into application(name,yr,ro,venue,reason,date,stats) values('$username','$ye','$rno','$venue','$reason','$date','pending')";
            $a = mysqli_query($conn, $r);
            $r1 = "insert into hostel_details values('$hn','$hno','$y')";
            $v = mysqli_query($conn, $r1);
            $r1 = "select * from application where ro='$y' and date='$date'";
            $v1 = mysqli_query($conn, $r1);
            $v11 = mysqli_fetch_assoc($v1);
            //   $ssn=$v11['ssn'];
            //  
            $q1 = "insert into app values($v11[ssn],'pending')";
            $rq1 = mysqli_query($conn, $q1);
            if ($a)
                echo "<script type='text/javascript'>
     alert('submitted')
     </script>";
            $showalert = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supported HTML Form Controls in Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Self-executing function
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function c() {
            alert("Sunmitted");
        }
    </script>
    <style>
        .box {

            border: 15px solid gray;
            padding: 25px;
            border-radius: 25px;
            border-color: turquoise;
            /* margin: 20px */
        }

        .center {
            text-align: center;
        }

        .w {
            width: 500px;
        }

        .ui {
            width: 750px;
        }

        .mk {
            text-align: center;
        }
    </style>
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./applicationstatus.php">Application status</a></li>
                            <li><a class="dropdown-item" href="./welcome.php">History</a></li>
                        </ul>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    if ($showalert)
        echo " <div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>Application already  Submitted!You can check your application status</strong> 
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    ?>
    <?php
    if ($showerror)
        echo " <div class='alert alert-danger alert-dismissible fade show' role='alert'>
<strong>RollNo is wrong</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    ?>
    <div class=" container box ui my-4">
        <h1 class="border-bottom pb-3 mb-4 my-2.75 mk ">Application Form</h1>
        <form class="needs-validation" action="application.php" method="post" novalidate>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="firstName">Name:</label>
                <div class="col-sm-9 w">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="emailAddress">Roll No:</label>
                <div class="col-sm-9 w">
                    <input type="text" class="form-control" id="rno" name="rno" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="phoneNumber">Venue:</label>
                <div class="col-sm-9 w">
                    <input type="text" class="form-control" id="venue" name="venue" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="phoneNumber">Hostel No:</label>
                <div class="col-sm-9 w">
                    <input type="number" class="form-control" id="hn" name="hn" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="phoneNumber">Hostel Room No:</label>
                <div class="col-sm-9 w">
                    <input type="number" class="form-control" id="hrn" name="hrn" required>
                </div>
            </div>
            <div class="row mb-3 ">
                <label for="date" class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-9 w ">
                    <input type="date" class="form-control" id="date" name="date">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="postalAddress">Reason:</label>
                <div class="col-sm-9 w">
                    <textarea rows="3" class="form-control" id="reason" name="reason" required></textarea>
                </div>
            </div>
            <!-- <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Gender:</label>
                <div class="col-sm-9 mt-2">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="gender" id="radioMale">
                        <label class="form-check-label" for="radioMale">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="gender" id="radioFemale">
                        <label class="form-check-label" for="radioFemale">Female</label>
                    </div>
                </div>
    </div> -->
            <div class="row mb-3">
                <div class="col-sm-9 offset-sm-3">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</body>

</html>