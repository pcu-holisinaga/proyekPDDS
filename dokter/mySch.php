<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Doctor - Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="assets/css/material.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link href="assets/css/time/bootstrap-clockpicker.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

    <!-- Inline CSS based on choices in "Settings" tab -->
    <style>
        .bootstrap-iso .formden_header h2,
        .bootstrap-iso .formden_header p,
        .bootstrap-iso form {
            font-family: Arial, Helvetica, sans-serif;
            color: black
        }

        .bootstrap-iso form button,
        .bootstrap-iso form button:hover {
            color: white !important;
        }

        .asteriskField {
            color: red;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HiDoc!</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active d-flex align-items-center justify-content-center">
                <a class="nav-link" href="#">
                    <i class="fa-user-circle"></i>
                    <span>Doctor's Dashboard</span> </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Doctor
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="index.php">
                    <i class=""></i>
                    <span>My Schedule</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Patient
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Patient List</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <!-- End of Sidebar -------------------------------------------------------------------------------------------------------------------------------------->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Dr. XYZ Sp.A</span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Doctor Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="col">

                        <div class="panel panel-primary">

                            <!-- panel heading starat -->
                            <div class="panel-heading">
                                <h3 class="panel-title">Add Schedule</h3>
                                <hr>
                            </div>
                            <!-- panel heading end -->

                            <div class="panel-body">
                                <!-- panel content start -->
                                <div class="bootstrap-iso">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <form class="form-horizontal" method="post">
                                                    <div class="form-group form-group-lg">
                                                        <label class="control-label col-sm-2 requiredField" for="date">
                                                            Date
                                                            <span class="asteriskField">
                                                                *
                                                            </span>
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar">
                                                                    </i>
                                                                </div>
                                                                <input class="form-control" id="date" name="date" type="date" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-group-lg">
                                                        <label class="control-label col-sm-2 requiredField" for="starttime">
                                                            Start Time
                                                            <span class="asteriskField">
                                                                *
                                                            </span>
                                                        </label>

                                                        <div class="col-sm-10">
                                                            <div class="input-group clockpicker" data-align="top" data-autoclose="true">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-clock-o">
                                                                    </i>
                                                                </div>
                                                                <input class="form-control" id="starttime" name="starttime" type="time" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-group-lg">
                                                        <label class="control-label col-sm-2 requiredField" for="endtime">
                                                            End Time
                                                            <span class="asteriskField">
                                                                *
                                                            </span>
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group clockpicker" data-align="top" data-autoclose="true">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-clock-o">
                                                                    </i>
                                                                </div>
                                                                <input class="form-control" id="endtime" name="endtime" type="time" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-10 col-sm-offset-2">
                                                            <button class="btn btn-primary " name="submit" type="submit">
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- panel content end -->
                                <!-- panel end -->
                            </div>
                        </div>
                        <hr>
                        <!-- panel start -->
                    </div>
                    <hr>
                    <div class="col">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">My Schedule</h3>
                                <hr>
                            </div>
                            <div class="bootstrap-iso">
                                <div class="container-fluid">
                                    <!-- disini -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Booking ID</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Start</th>
                                                <th scope="col">End</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mon, 1 June 2021</td>
                                                <td>02.00 WIB</td>
                                                <td>03.00 WIB</td>
                                                <td>
                                                    <input type="submit" class="btn btn-success" value="Edit">
                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mon, 1 June 2021</td>
                                                <td>04.00 WIB</td>
                                                <td>05.00 WIB</td>
                                                <td>
                                                    <input type="submit" class="btn btn-success" value="Edit">
                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- batas -->
                                </div>
                            </div>
                            <hr>
                            <div class="col">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Appointment</h3>
                                        <hr>
                                    </div>
                                    <div class="bootstrap-iso">
                                        <div class="container-fluid">
                                            <!-- disini -->
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Booking ID</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Start</th>
                                                        <th scope="col">End</th>
                                                        <th scope="col">Symptoms</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>sb</td>
                                                        <td>d@uc.ac.id</td>
                                                        <td>Mon, 1 June 2021</td>
                                                        <td>00.00 WIB</td>
                                                        <td>01.00 WIB</td>
                                                        <td>Batuk 2 Minggu Ga sembuh</td>
                                                        <td>
                                                            <input type="submit" class="btn btn-success" value="Start">
                                                            <input type="submit" class="btn btn-danger" value="Done">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Seo Lie Lian</td>
                                                        <td>afaf@afaf.ac.kr</td>
                                                        <td>Mon, 1 June 2021</td>
                                                        <td>02.00 WIB</td>
                                                        <td>03.00 WIB</td>
                                                        <td>Pusing 3 Tahun Ga Sembuh-sembuh</td>
                                                        <td>
                                                            <input type="submit" class="btn btn-success" value="Start">
                                                            <input type="submit" class="btn btn-danger" value="Done">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- batas -->
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                        <!-- End of Main Content -->

                        <!-- Footer -->
                        <footer class="sticky-footer bg-white">
                            <div class="container my-auto">
                                <div class="copyright text-center my-auto">
                                    <span>Copyright &copy; HiDoc!</span>
                                    <p>Gilbert A. Leuw C14180189 | Nalom A. Sinaga C14180248 | Jeshen O. Nathanel C14180256</p>
                                </div>
                            </div>
                        </footer>
                        <!-- End of Footer -->

                    </div>
                    <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->
                <!-- Bootstrap core JavaScript-->
                <script src="../vendor/jquery/jquery.min.js"></script>
                <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <!-- Core plugin JavaScript-->
                <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
                <!-- Custom scripts for all pages-->
                <script src="../js/sb-admin-2.min.js"></script>

                <script>
                    $(document).ready(function() {
                        var date_input = $('input[name="date"]'); //our date input has the name "date"
                        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
                        date_input.datepicker({
                            format: 'yyyy/mm/dd',
                            container: container,
                            todayHighlight: true,
                            autoclose: true,
                        })
                    })
                </script>
                <script type="text/javascript">
                    $('.clockpicker').clockpicker();
                </script>
                <script type="text/javascript">
                    $(function() {
                        $(".delete").click(function() {
                            var element = $(this);
                            var id = element.attr("id");
                            var info = 'id=' + id;
                            if (confirm("Are you sure you want to delete this?")) {
                                $.ajax({
                                    type: "POST",
                                    url: "deleteschedule.php",
                                    data: info,
                                    success: function() {}
                                });
                                $(this).parent().parent().fadeOut(300, function() {
                                    $(this).remove();
                                });
                            }
                            return false;
                        });
                    });
                </script>
</body>

</html>