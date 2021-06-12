<?php

include "procedural.php";

$request = 3;

// Read $_GET value
if(isset($_GET['request'])){
    $request = $_GET['request'];
}

// Fetch records 
if($request == 1){

   // Select record 
    $i = 1;
    $sql = "SELECT * FROM tb_menu";
    $employeeData = mysqli_query($con,$sql);

    $response = array();
    
    while($row = mysqli_fetch_assoc($employeeData)){
        $response[] = array(
            "no" => $i++,
            "id_menu" => $row['id_menu'],
            "menu" => $row['menu'],
            "harga" => $row['harga'],
            "detail" => $row['detail'],
            "img" => $row['img']
            );
    }

    echo json_encode($response);
    exit;
}

// Insert record
if($request == 2){

    $menu = $_POST['menu'];
    $harga = $_POST['harga'];
    $detail = $_POST['detail'];

    $namafile = $_FILES['img']['name'];
    $ukuranfile = $_FILES['img']['size'];
    $error = $_FILES['img']['error'];
    $tmpname = $_FILES['img']['tmp_name'];

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensiGambar;

    move_uploaded_file($tmpname, '../image/' . $namafilebaru);

    $response = 0;

    $query = $con->query("INSERT INTO tb_menu VALUES ('','$menu', '$harga', '$detail', '$namafilebaru') ");

    if ($query != 0) {
        $response = 1;
    }

    echo $response;
    exit;

}

if ($request == 3) {

    $id_menu = $_GET['id_menu'];

    $data_sql = $con->query("SELECT * FROM tb_menu WHERE id_menu = $id_menu ");
    $sql_data = $data_sql->fetch_assoc();
    $foto = $sql_data['img'];
    
    if ($foto != NULL) {
        if (file_exists("../image/".$foto)) {
            unlink("../image/".$foto);
        }

        $sql = $con->query("DELETE FROM tb_menu WHERE id_menu = $id_menu ");
    } else {
        $sql = $con->query("DELETE FROM tb_menu WHERE id_menu = $id_menu ");
    }

    if($sql){
        echo 1; 
    }else{
        echo 0;
    }

    exit;
}

if ($request == 4) {

    $id_menu = $_GET["id_menu"];
    $sql = $con->query("SELECT * FROM tb_menu WHERE id_menu = $id_menu ");

    $data = array();

    while ($ambil = $sql->fetch_assoc()) {
        $data[] = array(
            "id_menu" => $ambil['id_menu'],
            "menu" => $ambil['menu'],
            "harga" => $ambil['harga'],
            "detail" => $ambil['detail'],
            "img" => $ambil['img']
        );
    }

    echo json_encode($data);
    exit;
}

if ($request == 5) {
    $id_menu = $_POST['id_menu'];
    $nama = $_POST['menu'];
    $harga = $_POST['harga'];
    $detail = $_POST['detail'];
    $gambar_lama = $_POST['gambar_lama'];
    
    $sql = $con->query("SELECT * FROM tb_menu WHERE id_menu = $id_menu ");
    $data = $sql->fetch_assoc();
    $fotogambar = $data['img'];

    
    if ($_FILES['img']['error'] === 4) {
        $foto = $gambar_lama;
    } else {
        if ($fotogambar != NULL) {
            if (file_exists("../image/".$gambar_lama)) {
                unlink("../image/".$gambar_lama);
            }
        }
        
        $namafile = $_FILES['img']['name'];
        $ukuranfile = $_FILES['img']['size'];
        $error = $_FILES['img']['error'];
        $tmpname = $_FILES['img']['tmp_name'];

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namafile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensiGambar;
        
    }
    
    if (!empty($tmpname)) {
        move_uploaded_file($tmpname, "../image/".$namafilebaru);

        $response = 0;

        $query = $con->query("UPDATE tb_menu SET img = '$namafilebaru' WHERE id_menu = '$id_menu' ");
    } else {
        $response = 0;

        $query = $con->query("UPDATE tb_menu SET harga = 5000 WHERE id_menu = '$id_menu' ");
    }

    if ($query != 0) {
        $response = 1;
    }

    echo $response;

    exit;
}