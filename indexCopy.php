<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <title>Welcome to HiDoc</title>
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="#!">HiDoc!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
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
                <h1 class="font-weight-light">Selamat Datang di HiDok!</h1>
                <p>Solusi Kesehatan Masa Kini</p>

            </div>
        </div>
        <!-- Call to Action-->
        <div class="card text-white bg-secondary my-5 py-4 text-center">
            <div class="card-body">
                <p class="text-white m-0">Silakan Berkonsultasi Dengan Dokter-Dokter Kami Yang Tersedia</p>
            </div>
        </div>
        <!-- Content Row-->

        <?php
        $s_spesialis = "";
        $s_keyword = "";
        if (isset($_POST['search'])) {
            $s_spesialis = $_POST['s_spesialis'];
            $s_keyword = $_POST['s_keyword'];
        }
        ?>
        <form method="POST" action="">
            <div class="row mb-3">
                <div class="col-sm-12">
                    <h4>Cari Dokter Spesialis</h4>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <select name="s_spesialis" id="s_spesialis" class="form-control">
                            <option selected disabled>Filter Dokter Spesialis</option>
                            <option value="">Show All</option>
                            <option value="Sp.A" <?php if ($s_spesialis == "Sp.A") {
                                                        echo "selected";
                                                    } ?>>Spesialis Anak - Sp.A</option>
                            <option value="Sp.JP" <?php if ($s_spesialis == "Sp.JP") {
                                                        echo "selected";
                                                    } ?>>Spesialis Jantung & Pembuluh Darah - Sp.JP</option>
                            <option value="Sp.OG" <?php if ($s_spesialis == "Sp.OG") {
                                                        echo "selected";
                                                    } ?>>Spesialis Obstetri & Ginekologi - Sp.OG</option>
                            <option value="Sp.KK" <?php if ($s_spesialis == "Sp.KK") {
                                                        echo "selected";
                                                    } ?>>Spesialis Kulit & Kelamin - Sp.KK</option>
                            <option value="Sp.M" <?php if ($s_spesialis == "Sp.M") {
                                                        echo "selected";
                                                    } ?>>Spesialis Mata - Sp.M</option>
                            <option value="Sp.OT" <?php if ($s_spesialis == "Sp.OT") {
                                                        echo "selected";
                                                    } ?>>Spesialis Orthopaedi & Traumatologi - Sp.OT</option>
                            <option value="Sp.PD" <?php if ($s_spesialis == "Sp.PD") {
                                                        echo "selected";
                                                    } ?>>Spesialis Penyakit Dalam - Sp.PD</option>
                            <option value="Psikiater" <?php if ($s_spesialis == "Psikiater") {
                                                            echo "selected";
                                                        } ?>>Psikiater</option>
                            <option value="Sp.N" <?php if ($s_spesialis == "Sp.N") {
                                                        echo "selected";
                                                    } ?>>Spesialis Syaraf - Sp.N</option>
                            <option value="Sp.THT" <?php if ($s_spesialis == "Sp.THT") {
                                                        echo "selected";
                                                    } ?>>Spesialis Telinga Hidung Tenggorokan - Sp.THT</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" placeholder="Search" name="s_keyword" id="s_keyword" class="form-control" value="<?php echo $s_keyword; ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <button id="search" name="search" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>

        <?php

        $search_spesialis = '%' . $s_spesialis . '%';
        $search_keyword = '%' . $s_keyword . '%';


        $con = mysqli_connect("localhost", "root", "", "belajar");
        $query = mysqli_query($con, "SELECT * FROM doctor WHERE spesialis LIKE ? AND name like ? ORDER BY id ASC");
        $query2 = "SELECT * FROM doctor WHERE spesialis LIKE ? AND name like ? ORDER BY spesialis ASC";
        $cari = $con->prepare($query2);
        $cari->bind_param('ss', $search_spesialis, $search_keyword);
        $cari->execute();
        $result = $cari->get_result();


        ?>
        <div class="row gx-4 gx-lg-5">
            <?php
            while ($data = mysqli_fetch_array($result)) {
            ?>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $data["name"] . " " . $data["spesialis"]; ?></h2>
                        </div>
                        <!-- <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!" onclick="loginDulu()">Show Schedule</a></div> -->
                        <a class="btn btn-primary" onclick="loginDulu()">
                            Show Schedule
                        </a>
                    </div>
                </div>
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
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script>
        function loginDulu() {
            alert("Silakan Login Untuk Melihat Jadwal Dokter");
        }
    </script>


</body>

</html>