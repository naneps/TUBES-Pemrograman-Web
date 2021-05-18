<?

$servername ="localhost";
$username ="root";
$password ="";

$connection = mysqli_connect($servername ,$username ,$password);

if (!$connection){
    die("Koneksi Gaga;" . mysqli_connect_error());
}
echo "Koneksi Sukses";
?>