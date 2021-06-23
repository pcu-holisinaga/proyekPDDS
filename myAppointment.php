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
    <title>My Appointment</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="patIndex.php">HiDoc!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="patIndex.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item"><a class="nav-link active" href="myAppointment.php">My Appointment</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">

        <div class="container-fluid">
            <div class="col">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">My Appointment</h3>
                        <p>Patient Name : <?php echo $_SESSION['user']['name'] ?></p>
                        <hr>
                    </div>
                    <div class="bootstrap-iso">
                        <div class="container-fluid">
                            <!-- disini -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Booking ID</th>
                                        <th scope="col">Dr. Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Start</th>
                                        <th scope="col">End</th>
                                        <th scope="col">Your Symptoms</th>
                                        <!-- <th scope="col">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    require_once './vendor/autoload.php';
                                    $client = new MongoDB\Client(
                                        'mongodb://localhost:27017/?readPreference=primary&appname=MongoDB%20Compass&ssl=false'
                                    );
                                    $myAppoinment = $client->dbPDDS->appointment->find(['patName' => $_SESSION['user']['name']]);
                                    foreach ($myAppoinment as $data) {
                                        echo "<tr>";

                                        echo "<td>" . $data->bookingId . "</td>";
                                        echo "<td>" . $data->drname . "</td>";
                                        echo "<td>" . $data->date . "</td>";
                                        echo "<td>" . $data->startTime . "</td>";
                                        echo "<td>" . $data->endTime . "</td>";
                                        echo "<td>" . $data->keluhan . "</td>";
                                        // echo "<td>action</td>";


                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- batas -->
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>

</html>