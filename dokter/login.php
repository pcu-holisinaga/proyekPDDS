<?php

require_once("../config.php");

if (isset($_POST['login'])) {

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM doctor WHERE username=:username";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":username" => $username,

    );

    $stmt->execute($params);
    $dokter = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if ($dokter) {
        // verifikasi password
        if (password_verify($password, $dokter["password"])) {
            // buat Session
            session_start();
            $_SESSION["dokter"] = $dokter;
            // login sukses, alihkan ke halaman index
            header("Location: index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Doctor Login</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"> <img src="../img/dokter.png" alt="" height="450" width="450"> </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Dokter - HiDoc!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="username" placeholder="Username" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="password" name="password" placeholder="Password" />
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="login" value="Masuk" />
                                        <hr>

                                    </form>
                                    <div class="text-center">
                                        <p>Belum Punya Akun? <a href="register.php">Daftar Disini</a> </p>
                                        <br>
                                        <a class="small" href="../admin/login.php">Login sebagai Admin</a>
                                        <br>
                                        <a class="small" href="../login.php">Login sebagai Pasien</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>