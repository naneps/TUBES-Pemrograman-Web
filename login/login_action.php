<?php
session_start();

include "koneksi.php";

$username = htmlspecialchars($_POST["username"]);
$p = htmlspecialchars(md5($_POST["password"]));


$sql = "select * from user where username='" . $username . "' and password='" . $p . "' limit 1";
$hasil = mysqli_query($kon, $sql);
$jumlah = mysqli_num_rows($hasil);


if ($jumlah > 0) {
	$row = mysqli_fetch_assoc($hasil);
	$_SESSION["id_user"] =  $row["id_user"];
	$_SESSION["username"] = $row["username"];
	$_SESSION["nama"] = $row["nama"];
	$_SESSION["email"] = $row["email"];
	echo "
    <script> alert('Login Berhasil!'); 
	document.location.href='../dashboard/dashboard.php';
    </script>";
} else {
	echo "
    <script> alert('Login gagal!'); 
	document.location.href='login.php';
    </script>";
}
