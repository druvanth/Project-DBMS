<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
    header("location: /Project(DBMS)/login.php");
else {
    $y = $_SESSION['ye'];
    $b = $_SESSION['br'];
    $d = $_SESSION['da'];
}
?>
<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "student";
$conn = mysqli_connect($server, $username, $password, $database);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoedit'])) {
        $snm = $_POST['snoedit'];
        $st = $_POST['statusedit'];
        $q2 = "update  app set status='$st' where sn='$snm'";
        $rq2 = mysqli_query($conn, $q2);
        $q3 = "update  application set stats='$st' where ssn='$snm'";
        $rq2 = mysqli_query($conn, $q3);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Simple Data Table</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Roboto', sans-serif;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
            min-width: 100%;
        }

        .table-title h2 {
            margin: 8px 0 0;
            font-size: 22px;
        }

        .search-box {
            position: relative;
            float: right;
        }

        .search-box input {
            height: 34px;
            border-radius: 20px;
            padding-left: 35px;
            border-color: #ddd;
            box-shadow: none;
        }

        .search-box input:focus {
            border-color: #3FBAE4;
        }

        .search-box i {
            color: #a0a5b1;
            position: absolute;
            font-size: 19px;
            top: 8px;
            left: 10px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child {
            width: 130px;
        }

        table.table td a {
            color: #a0a5b1;
            display: inline-block;
            margin: 0 5px;
        }

        table.table td a.view {
            color: #03A9F4;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 95%;
            width: 30px;
            height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 30px !important;
            text-align: center;
            padding: 0;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 6px;
            font-size: 95%;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="em" tabindex="-1" role="dialog" aria-labelledby="eml" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eml">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="info.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoedit" id="snoedit">
                        <div class="form-group">
                            <label for="title">Status</label>
                            <input type="text" class="form-control" id="statusedit" name="statusedit" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/Project(DBMS)/home.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Project(DBMS)/logout.php">Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Customer <b>Details</b></h2>
                        </div>
                        <div class="col-sm-4">
                            <div class="search-box">
                                <i class="material-icons">&#xE8B6;</i>
                                <input type="text" class="form-control" placeholder="Search&hellip;">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>Name <i class="fa fa-sort"></i></th>
                            <th>RollNo</th>
                            <th>Year</th>
                            <th>City <i class="fa fa-sort"></i></th>
                            <th>Reason</th>
                            <th>Status <i class="fa fa-sort"></i></th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q1 = "select a.ssn,a.name,a.ro,a.yr,a.venue,a.reason,ap.status from application a,app ap where a.ssn=ap.sn and a.yr='$y' and a.date='$d'";
                        $rq1 = mysqli_query($conn, $q1);
                        while ($r = mysqli_fetch_assoc($rq1)) {
                            echo "
                    <tr>
        
                        <td>" . $r['name'] . "</td>
                        <td>" . $r['ro'] . "</td>
                        <td>" . $r['yr'] . "</td>
                        <td>" . $r['venue'] . "</td>
                        <td>" . $r['reason'] . "</td>
                        <td>" . $r['status'] . "</td>
                      
                        <td>
                        
                    
                        <button class='dit btn btn-primary' id=" . $r['ssn'] . ">Edit</button>
                    
                        <a href='#' class='delete' title='Delete' data-toggle='tooltip'><i class='material-icons'>&#xE872;</i></a>''
                        </td>
                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            e = document.getElementsByClassName('dit');
            Array.from(e).forEach((element) => {
                element.addEventListener('click', (ed) => {
                    console.log("edit");
                    tr = ed.target.parentNode.parentNode;
                    sts = tr.getElementsByTagName("td")[5].innerText;
                    console.log(sts);
                    statusedit.value = sts;
                    snoedit.value = ed.target.id;
                    console.log(ed.target.id);
                    $('#em').modal('toggle');
                })
            })
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script>$(document).ready( function () {
    $('#myTable').DataTable();
} );</script>

</body>

</html>