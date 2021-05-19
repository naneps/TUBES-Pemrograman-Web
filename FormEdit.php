
<?php
session_start();
if(!$_SESSION['id_user']){
header('location:login/login.php');
}
require_once 'proses/procedural.php';

$id = $_GET['id'];

$sql = "SELECT *FROM tb_menu where id ='$id'";
$qry = mysqli_query($connection , $sql);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" href="style.css">
        <title>Form</title>
    
    </head>
    
    <body>

        <div class="container">
            <div class="judul">Edit Data </div>
            <form id="data" action="" method="post" onsubmit="validasi()">
                        <?php 
                        $data = array();
                            while($row = mysqli_fetch_array($qry) ){
                                $data = $row;

                            }
                        
                        ?>
                    <input placeholder="Nama Menu" type="text" name="nama" id="nama" value="<?=$data['menu']?>">
            
              
                    <input placeholder="Harga" type="text" name="harga" id="harga" value="<?=$data['harga']?>"> 
              

                    <fieldset>
                        <button name="submit" type="submit" id="submit"
                            >Edit Datas</button>
                        
                            <a class="btn" href="tabel.php">Tampilkan Data</a>
                    </fieldset>
            </form>
        </div>
        <?php
        if(isset($_POST['submit']) && $_POST['nama'] != '' && $_POST['harga']){
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            
            
            $sql = "UPDATE tb_menu SET menu ='$nama', harga ='$harga' WHERE id='$id'";
            $query = mysqli_query($connection,$sql);
            if($query){
                echo "<script>alert('data berhasil diedit');
                document.location.href='tabel.php'
                </script>";
                
            }
        }
                ?>
        <script type="text/javascript">
	function validasi() {
		let nama = document.getElementById("nama").value;
		let harga = document.getElementById("harga").value;

		if (nama != "" && harga!="" ) {
			return true;
		}else{
            alert('Data Harus Diisi');
            returnToPreviousPage();
            return false;
		}
	}
</script>
    </body>

</html>