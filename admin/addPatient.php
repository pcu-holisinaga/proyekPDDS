<?php
require_once("auth.php");
require_once("../config.php");
if (isset($_POST['addPatient'])) {

    //Filter Data yg masuk
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    //Pass Encrypt
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $dob = date('Y-m-d', strtotime($_POST['dob']));

    $sql = "INSERT INTO users (name, username, email, dob, password) VALUES (:name, :username, :email, :dob, :password)";
    $stmt = $db->prepare($sql);

    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":email" => $email,
        ":dob" => $dob,
        ":password" => $password

    );

    //save to DB
    $saved = $stmt->execute($params);

    if ($saved) {
        echo "<script type='text/javascript'>
        alert('Patient Added');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - Dashboard</title>
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
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
                    <span>ADMINISTRATOR</span> </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading active">
                DOCTOR
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="addDoctor.php">
                    <i class=""></i>
                    <span>Add Doctor</span>
                </a>
                <a class="nav-link collapsed" href="drList.php">
                    <i class=""></i>
                    <span>Doctor List</span>
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
                <a class="nav-link collapsed" href="addPatient.php">

                    <span>Add Patient</span>
                </a>
                <a class="nav-link collapsed" href="patientList.php">

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo  $_SESSION["admin"]["username"] ?>
                                </span>
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
                        <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="col">
                        <div class="panel-heading">
                            <h4 class="panel-title">Add New Patient</h4>
                            <hr>
                        </div>
                        <div class="panel panel-primary">

                            <div class="panel-body">
                                <!-- panel content start -->
                                <div class="bootstrap-iso">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <form class="form-horizontal" method="POST">

                                                    <div class="form-group form-group-lg">
                                                        <label class="control-label col-sm-2 requiredField" for="name">
                                                            Name
                                                            <span class="asteriskField">
                                                                *
                                                            </span>
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <input class="form-control" id="name" name="name" type="text" placeholder="Patient's Fullname" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group form-group-lg">
                                                        <label class="control-label col-sm-2 requiredField" for="username">
                                                            Username
                                                            <span class="asteriskField">
                                                                *
                                                            </span>
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <input class="form-control" id="username" name="username" type="text" placeholder="Patient's Username" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group form-group-lg">
                                                        <label class="control-label col-sm-2 requiredField" for="email">
                                                            Email
                                                            <span class="asteriskField">
                                                                *
                                                            </span>
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group clockpicker" data-align="top" data-autoclose="true">
                                                                <input class="form-control" id="email" name="email" type="email" placeholder="Patient's Email" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group form-group-lg">
                                                        <label class="control-label col-sm-2 requiredField" for="dob">
                                                            Date of Birth
                                                            <span class="asteriskField">
                                                                *
                                                            </span>
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group clockpicker" data-align="top" data-autoclose="true">
                                                                <input type="text" class="form-control" name="dob" placeholder="Date of Birth" onfocus="(this.type='date')">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group form-group-lg">
                                                        <label class="control-label col-sm-2 requiredField" for="password">
                                                            Password
                                                            <span class="asteriskField">
                                                                *
                                                            </span>
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group clockpicker" data-align="top" data-autoclose="true">
                                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" required />
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <div class="col-sm-10 col-sm-offset-2">
                                                            <button class="btn btn-primary " name="addPatient" type="submit">
                                                                Add Doctor
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




                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->

                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; HiDoc!</span>
                        <p>Gilbert A. Leuw C14180189 | Nalom A. Sinaga C14180248 | Jeshen O. Nathanel C14180256</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- End of Page Wrapper -->
        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>
</body>

</html>