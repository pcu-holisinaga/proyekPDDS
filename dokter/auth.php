<?php

session_start();
if (!isset($_SESSION["dokter"])) header("Location: login.php");
