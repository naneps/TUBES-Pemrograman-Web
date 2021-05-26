<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'tubes_web';
$kon = mysqli_connect($servername, $username, $password, $dbname);

if (!$kon) {
    die("Koneksi Gagal" . mysqli_connect_error());
}
