<?php
session_start();
if (!$_SESSION['id_user']) {
    header('location:login/login.php');
}
require_once 'proses/procedural.php';
if (isset($_POST['submit']) && $_POST['nama'] != '' && $_POST['harga']) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];


    $sql = "INSERT INTO tb_menu (menu,harga) VALUES ('$nama','$harga')";
    $query = mysqli_query($connection, $sql);
    if ($query) {
        echo "<script>alert('data berhasil ditambahkan');
     document.location.href='form.php'
     </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
</head>

<body>

    <div class="container">
        <h5 class="nama">Hi ,<?= $_SESSION['nama'] ?></h5>
        <div class="judul">Tambah Data </div>
        <form id="data" action="" method="post" onsubmit="validasi()">s
            <input placeholder="Nama Menu" type="text" name="nama" id="nama">
            <input placeholder="Harga" type="text" name="harga" id="harga">
            <button name="submit" type="submit" id="submit">Tambahkan</button>

            <a class="btn" href="tabel.php">Tampilkan Data</a>
            <a class="btn" href="login/logout_action.php">Logout</a>

        </form>
    </div>
    <script type="text/javascript">
        function validasi() {
            let nama = document.getElementById("nama").value;
            let harga = document.getElementById("harga").value;

            if (nama != "" && harga != "") {
                return true;
            } else {
                alert('Data Harus Diisi');
                returnToPreviousPage();
                return false;
            }
        }
    </script>
</body>

</html>