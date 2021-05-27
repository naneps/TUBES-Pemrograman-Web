<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'tubes_web';
$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Koneksi Gagal" . mysqli_connect_error());
}
