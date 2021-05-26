<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'tubes_web';
$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Koneksi Gagal" . mysqli_connect_error());
}
