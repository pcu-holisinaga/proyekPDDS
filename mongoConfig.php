<?php
require_once __DIR__ . "/vendor/autoload.php";
session_start();
$collection = (new MongoDB\Client)->dbPDDS->appointment;

$waktu = date("Y-m-d") . ' ' . date("H:i");
$insertOneResult = $collection->insertOne([
    'bookingId' => $_POST['bookingId'],
    'drId' => $_POST['drId'],
    'patName' =>  $_SESSION["user"]["name"],
    'patEmail' =>  $_SESSION["user"]["email"],
    'date' => $_POST['date'],
    'startTime' => $_POST['startTime'],
    'endTime' => $_POST['endTime'],
    'keluhan' => $_POST['addKeluhan']
]);
header('Location: patIndex.php');

$connn = mysqli_connect("localhost", "root", "", "belajar");
$abc = $_POST['bookingId'];
$editStat = mysqli_query($connn, "UPDATE drschedule SET status=1 WHERE id=$abc");
