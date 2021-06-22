<?php

require_once("../config.php");

if (isset($_POST['register'])) {

    //Filter Data yg masuk
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    //Pass Encrypt
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $spesialis = $_POST['spesialis'];
    $sql = "INSERT INTO doctor (name, spesialis, username, email, password) VALUES (:name, :spesialis, :username, :email, :password)";
    $stmt = $db->prepare($sql);


    $params = array(
        ":name" => $name,
        ":spesialis" => $spesialis,
        ":username" => $username,
        ":email" => $email,
        ":password" => $password
    );

    //save to DB
    $saved = $stmt->execute($params);

    if ($saved) header("Location: login.php");
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

    <title>Register - HiDoc</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="../img/register.png" alt="" width="400" height="450">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create a Doctor Account!</h1>
                            </div>
                            <form class="user" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="name" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Username"> -->
                                        <select type="text" class="form-control" placeholder="Spesialis" name="spesialis">
                                            <option selected disabled>Spesialisasi : </option>
                                            <option value="Sp.A">Anak - Sp.A</option>
                                            <option value="Sp.JP">Jantung & Pembuluh Darah - Sp.JP</option>
                                            <option value="Sp.OG">Kandungan & Ginekologi - Sp.OG</option>
                                            <option value="Sp.KK">Kulit & Kelamin - Sp.KK</option>
                                            <option value="Sp.M"> Mata - Sp.M</option>
                                            <option value="Sp.OT">Orthopaedi dan Traumatologi - Sp.OT</option>
                                            <option value="Sp.PD">Penyakit Dalam - Sp.PD</option>
                                            <option value="Psikiater">Psikiater</option>
                                            <option value="Sp.N">Saraf - Sp.N</option>
                                            <option value="Sp.THT">THT - Sp.THT</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">

                                        <input type="text" class="form-control form-control-user" name="username" placeholder="Username">
                                    </div>
                                    <div class=" col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Pesbuk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">

                <p>&larr; <a href="index.php">Home</a>

                <h4>Register</h4>
                <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

                <form action="" method="POST">

                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input class="form-control" type="text" name="name" placeholder="Nama kamu" />
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username" />
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Alamat Email" />
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" />
                    </div>

                    <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />
                </form>
            </div>
        </div>
    </div>

</body>

</html> -->