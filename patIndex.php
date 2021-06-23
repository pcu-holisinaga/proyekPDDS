<?php
require_once("auth.php")


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
    <title>Welcome to HiDoc</title>
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="patIndex.php">HiDoc!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="myAppointment.php">My Appointment</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content-->

    <div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="./asset/img/gambarawal.png" alt="..." /></div>
            <div class="col-lg-5">
                <h1 class="font-weight-light">Selamat Datang, <span> <?php echo  $_SESSION["user"]["name"] ?> </span> </h1>
            </div>
        </div>
        <!-- Call to Action-->
        <div class="card text-white bg-dark my-5 py-4 text-center">
            <div class="card-body">
                <p class="text-white m-0">Silakan Berkonsultasi Dengan Dokter-Dokter Kami Yang Tersedia</p>
            </div>
        </div>
        <!-- Content Row-->

        <?php

        $con = mysqli_connect("localhost", "root", "", "belajar");
        $query = mysqli_query($con, "SELECT * FROM doctor ");
        ?>

        <div class="row gx-4 gx-lg-5">
            <?php
            while ($data = mysqli_fetch_array($query)) {

            ?>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $data["name"] . " " . $data["spesialis"]; ?></h2>
                        </div>
                        <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $data["id"]; ?>">
                            Show Schedule
                        </a>
                    </div>
                </div>

                <div class="modal fade" id="exampleModalCenter<?php echo $data["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"> <?php echo $data["name"] . " " . $data["spesialis"]; ?> </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php
                                $conSch = mysqli_connect("localhost", "root", "", "belajar");
                                $querySch = mysqli_query($conSch, "SELECT * FROM drschedule WHERE status='0'");
                                $querySch2 = mysqli_query($conSch, "SELECT * FROM drschedule ");
                                $count = 1;
                                while ($dataSch = mysqli_fetch_array($querySch)) {
                                    if ($data["id"] == $dataSch["drId"]) {

                                        echo "Sesi - " . $count;
                                        echo "<br>";
                                        echo "Date : " . $dataSch["date"];
                                        echo "<br>";
                                        echo "Time : " . $dataSch["startTime"] . " - " . $dataSch["endTime"];
                                        echo "<br>";
                                        echo "<button type=\"button\" class=\"btn btn-primary close\" data-toggle=\"modal\" data-target=\"#tesboking" . $dataSch['id'] . "\" data-dismiss=\"modal\" aria-label=\"Close\" >Book</button>";
                                        echo "<hr>";
                                        $count++;
                                    }
                                }
                                $count = 1;
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $conSch2 = mysqli_connect("localhost", "root", "", "belajar");
                $querySch2 = mysqli_query($conSch2, "SELECT * FROM drschedule");

                $count2 = 1;

                while ($dataSch2 = mysqli_fetch_array($querySch2)) {
                    if ($data["id"] == $dataSch2["drId"]) {
                        $count2++;
                        echo "<div class=\"modal fade\" id=\"tesboking" . $dataSch2['id'] . "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">";
                        echo "<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">";
                        echo "<div class=\"modal-content\">";
                        echo "<div class=\"modal-header\">";
                        echo "<h5 class=\"modal-title\" id=\"exampleModalLongTitle\">Keluhan / Gejala</h5>";
                        echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">";
                        echo "<span aria-hidden=\"true\">&times;</span> </button> </div>";
                        echo "<div class=\"modal-body\">";
                        echo "<form action=\"mongoConfig.php\" method=\"POST\">";
                        echo "<div class=\"form-group form-group-lg\">";
                        //echo "<label class=\"control-label col-sm-2 requiredField\" for=\"drId\"> Keluhan : </label>";
                        echo "<div class=\"col-sm-10\">";
                        echo "<div class=\"input-group\">";
                        echo "<input class=\"form-control\" id=\"bookingId\" name=\"bookingId\" type=\"text\" value=\"" . $dataSch2['id'] . "\" hidden />";
                        echo "<input class=\"form-control\" id=\"drId\" name=\"drId\" type=\"text\" value=\"" . $dataSch2['drId'] . "\" hidden />"; //DR ID
                        echo "<input class=\"form-control\" id=\"drname\" name=\"drname\" type=\"text\" value=\"" . $dataSch2['drname'] . "\" hidden />"; //DR NAME

                        echo "<input class=\"form-control\" id=\"date\" name=\"date\" type=\"text\" value=\"" . $dataSch2['date'] . "\" hidden />";
                        echo "<input class=\"form-control\" id=\"startTime\" name=\"startTime\" type=\"text\" value=\"" . $dataSch2['startTime'] . "\" hidden />";
                        echo "<input class=\"form-control\" id=\"endTime\" name=\"endTime\" type=\"text\" value=\"" . $dataSch2['endTime'] . "\" hidden />";
                        echo "<input class=\"form-control\" id=\"addKeluhan\" name=\"addKeluhan\" type=\"text\" placeholder=\"Ketik Disini...\" required /> </div></div></div></div>";
                        echo "<div class=\"modal-footer\">";
                        echo "<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancel</button>";
                        echo "<button type=\"submit\" class=\"btn btn-primary\">Book Now</button>";
                        echo "</div></form></div></div></div>";
                    }
                }
                $count2 = 1;
                ?>

            <?php } ?>
        </div>
    </div>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; <a href="./admin/admin.php"> HiDoc 2021</a></p>
            <p class="m-0 text-center text-white">Gilbert Auldey L. - C14180189 | Nalom A. Sinaga - C14180248 | Jeshen Oktavian N. - C14180256</p>
        </div>
    </footer>

    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom sipts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>