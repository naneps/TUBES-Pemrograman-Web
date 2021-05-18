<?php 

require_once 'proses/procedural.php';

$sql = 'SELECT * FROM tb_menu';
$query = mysqli_query($connection,$sql);


?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="tabel.css">
        <title>Document</title>
    </head>
    <body>
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                        while($row=mysqli_fetch_array($query)){
                            echo 
                            "<tr>
                                <td>".$no++."</td>
                                <td>".$row['menu']."</td>
                                <td>".$row['harga']."</td>
                                <td>
                                <a href='formedit.php?id=".$row['id']."'>Edit</a> | <a href='proses/delete.php?id=".$row['id']."'>Hapus</a>
                                </td> 
                            </tr>";
                        }
                    ?>

                </tbody>
            </table>
            <button> <a href="form.php">Tambah Data</a> </button>
        </div>
    </body>

</html>