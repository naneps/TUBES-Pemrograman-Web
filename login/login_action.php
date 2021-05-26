<?php
session_start();

include "koneksi.php";

$username = $_POST["username"];
$p = md5($_POST["password"]);


$sql = "select * from user where username='" . $username . "' and password='" . $p . "' limit 1";
$hasil = mysqli_query($kon, $sql);
$jumlah = mysqli_num_rows($hasil);


if ($jumlah > 0) {
	$row = mysqli_fetch_assoc($hasil);
	$_SESSION["id_user"] = $row["id_user"];
	$_SESSION["username"] = $row["username"];
	$_SESSION["nama"] = $row["nama"];
	$_SESSION["email"] = $row["email"];

	header("Location:../dashboard/dashboard.php");
} else {
	echo "Username atau password salah <br><a href='login.php'>Kembali</a>";
}
