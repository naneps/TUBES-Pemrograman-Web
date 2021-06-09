<?php
include 'procedural.php';

$request = 2;

// Read $_GET value
if (isset($_GET['request'])) {
    $request = $_GET['request'];
}
if ($request == 1) {

    // Select record 
    $sql = "SELECT * FROM tb_menu ";
    $data = mysqli_query($con, $sql);

    $response = array();
    $no = 1;
    //    "<a class=' btn_edit' href='formedit.php?id=" . $row[' id'] . "'>Edit</a>  <a class='btn_delete' href='proses/delete.php?id=" . $row['id'] . "'>Hapus</a>";
    while ($row = mysqli_fetch_assoc($data)) {
        $response[] = array(
            'no' => $no++,
            "menu" => $row['menu'],
            "harga" => $row['harga'],
            "detail" => $row['detail'],
            "img" => $row['img'],

        );
    }

    echo json_encode($response);
    exit;
}
// POST
if ($request == 2) {




    // Read POST data
    // $data = json_decode(file_get_contents("php://input"));

    // $menu = $data->menu;
    // $harga = $data->harga;
    // $detail = $data->detail;
    // $img = $data->img;
    $menu = $_POST['menu'];
    $harga = $_POST['harga'];
    $detail = $_POST['detail'];

    $namafile = $_FILES['img']['name'];
    $ukuranfile = $_FILES['img']['size'];
    $error = $_FILES['img']['error'];
    $tmpname = $_FILES['img']['tmp_name'];


    $ekstensiGambar = $namafile[];

    // Insert record

    $sql = "INSERT INTO  tb_menu (menu, harga , detail , img) VALUES('$menu','$harga' ,'$detail' , '$img' )";

    if (mysqli_query($con, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
}
