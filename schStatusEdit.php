<?php

$connn = mysqli_connect("localhost", "root", "", "belajar");
$abc = 4;
$editStat = mysqli_query($connn, "UPDATE drschedule SET status=1 WHERE id=$abc");
