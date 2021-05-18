<?php 
require_once 'procedural.php';

$id = $_GET['id'];

$sql = "DELETE FROM tb_menu where id = '$id'";


$query = mysqli_query($connection , $sql);

if($query ){
    echo "<script>alert('data berhasil dihapus');
    document.location.href='../tabel.php'
    </script>";
}
?>