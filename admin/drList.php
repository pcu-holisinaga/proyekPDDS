<?php
require_once("auth.php");

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
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
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
                <a class="nav-link active collapsed" href="#">
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
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Add Patient</span>
                </a>
                <a class="nav-link collapsed" href="patientList.php">
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

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Doctor List</h3>
                                <hr>
                            </div>
                            <div class="bootstrap-iso">
                                <div class="container-fluid">
                                    <!-- disini -->
                                    <table class="table">
                                        <?php
                                        $link = mysqli_connect("localhost", "root", "", "belajar");
                                        $result = mysqli_query($link, "SELECT * FROM doctor ORDER BY id ASC");
                                        ?>
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Doctor ID</th>
                                                <th scope="col">Doctor Name</th>
                                                <th scope="col">Specialization</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (mysqli_num_rows($result) > 0) { ?>
                                                <?php
                                                $no = 1;
                                                while ($data = mysqli_fetch_array($result)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no ?></td>
                                                        <td>DR-<?php echo $data["id"]; ?></td>
                                                        <td><?php echo $data["name"]; ?></td>
                                                        <td><?php echo $data["spesialis"]; ?></td>
                                                        <td><?php echo $data["email"]; ?></td>
                                                        <td><?php echo $data["status"]; ?></td>
                                                        <td>
                                                            <input type="submit" class="btn btn-success" value="Edit">
                                                            <input type="submit" class="btn btn-danger" value="Delete">
                                                            <input type="submit" class="btn btn-warning" value="Change Status">
                                                        </td>
                                                    </tr>
                                                <?php $no++;
                                                } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <!-- batas -->
                                </div>
                            </div>
                            <hr>

                            <div class="col">

                            </div>

                        </div>



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