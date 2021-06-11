<?php
include 'procedural.php';


$request = 3;

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

    move_uploaded_file($tmpname, '../../image/' . $namafilebaru);

    $response = 0;
    // Insert record

    $query = $con->query("INSERT INTO  tb_menu (menu, harga , detail , img) VALUES('$menu','$harga' ,'$detail','$namafilebaru' ) ");

    if ($query != 0) {
        $response = 1;
    }

    echo $response;
    exit;
}
