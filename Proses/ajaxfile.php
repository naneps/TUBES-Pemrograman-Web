<?php
include 'procedural.php';

$request = 2;

// Read $_GET value
if (isset($_GET['request'])) {
    $request = $_GET['request'];
}
if ($request == 1) {

    // Select record 
    $sql = "SELECT * FROM tb_menu";
    $data = mysqli_query($con, $sql);

    $response = array();
    while ($row = mysqli_fetch_assoc($data)) {
        $response[] = array(
            "nama" => $row['menu'],
            "harga" => $row['harga'],
            "detail" => $row['detail'],
            "img" => $row['img'],
        );
    }

    echo json_encode($response);
    exit;
}

if ($request == 2) {


    // Read POST data
    $data = json_decode(file_get_contents("php://input"));

    $nama = $data->nama;
    $harga = $data->harga;
    $detail = $data->detail;
    $img = $data->img;

    // Insert record

    $sql = "INSERT INTO  tb_menu (menu, harga , detail , img) VALUES('$nama','$harga' ,'$detail' , '$img' )";

    if (mysqli_query($con, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
}
