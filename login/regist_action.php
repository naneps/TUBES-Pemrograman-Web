<?php 

include 'koneksi.php';

$nama = htmlspecialchars($_POST['nama']) ;
$email = htmlspecialchars($_POST['email']) ;
$username = htmlspecialchars($_POST['username']) ;
$password = htmlspecialchars(md5($_POST['password']) );

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
