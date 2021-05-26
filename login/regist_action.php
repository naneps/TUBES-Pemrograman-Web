<?php 

include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$username = $_POST['username'];
$password =md5($_POST['password']);

if($nama !='' && $email !=''&& $username !='' && $password !='' ){

    $sql ="INSERT INTO user (username ,nama , email , password ) VALUES ('$username' , '$nama' , '$email' , '$password')";
    
    $qry = mysqli_query($kon , $sql);
     
    if($qry){
       
         header('location:login.php');
    }
}
else{
    echo "
    <script> alert('Data Harus Diisi!'); 
    window.location='register.php';
    </script>";
}

?>
