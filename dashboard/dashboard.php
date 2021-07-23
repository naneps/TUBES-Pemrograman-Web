<?php
session_start();
if (!$_SESSION['id_user']) {
  header('location:login/login.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/tabel.css">
  <script src="https://kit.fontawesome.com/fc4d05615c.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>

  <input type="checkbox" id="check">
  <!--header area start-->
  <header>
    <label for="check">
      <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
      <h3>Kelola Data</h3>
    </div>

  </header>
  <!--header area end-->
  <!--mobile navigation bar start-->
  <div class="mobile_nav">
    <div class="nav_bar">
      <img src="1.png" class="mobile_profile_image" alt="">
      <i class="fa fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_items">
      <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="#"><i class="fab fa-wpforms"></i><span>Form</span></a>
      <a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
      <a href="../login/logout_action.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>

    </div>
  </div>
  <!--mobile navigation bar end-->
  <!--sidebar start-->
  <div class="sidebar">
    <div class="profile_info">
      <!-- <img src="" class="profile_image" alt="img"> -->
      <h4><?= $_SESSION['nama'] ?></h4>
    </div>
    <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
    <a href="#"><i class="fab fa-wpforms"></i></i><span>Form</span></a>
    <a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
    <a href="../login/logout_action.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
    <!--sidebar end-->
  </div>
  <div class="content">
    <div class="card">
      <div class="judul">Tambah Data </div>
      <div id="data">
        <input type="hidden" id="id_menu">
        <input type="hidden" id="gambar_lama">
        <input placeholder="Nama Menu" type="text" name="menu" id="menu">
        <input placeholder="Harga" type="text" name="harga" id="harga">
        <input placeholder="detail" type="text" name="detail" id="detail">
        <input placeholder="img" type="file" name="img" id="img">
        <label for="image" id="label_gambar" hidden> Gambar Produk </label>
        <div id="ambil_gambar"></div>
        <button name="submit" id="btn" onclick="insert()">Tambahkan</button>
        <button name="simpan" id="btn_update" onclick="update()" hidden> Simpan </button>
      </div>
    </div>
    <div class="card">
      <table id='empTable' cellpadding='10' cellspacing='0'>
        <thead>
          <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Detail</th>
            <th>Gambar</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>


    <script type="text/javascript">
      $(document).ready(function() {
        $(' .nav_btn').click(function() {
          $('.mobile_nav_items').toggleClass('active');
        });
      });
    </script>
    <script type="text/javascript">
      loadEmployees();

      function edit(id_menu) {
        let gambar_lama = document.getElementById('gambar_lama');
        let menu = document.getElementById('menu');
        let harga = document.getElementById("harga");
        let ambil_gambar = document.getElementById("ambil_gambar");
        let label_gambar = document.getElementById("label_gambar");
        let btn = document.getElementById('btn');
        let btn_edit = document.getElementById('btn_edit');
        let btn_update = document.getElementById('btn_update');

        label_gambar.hidden = false;
        btn.hidden = true;
        btn_update.hidden = false;
        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../proses/ajaxfile.php?request=4&id_menu=" + id_menu, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);
            for (let key in response) {
              if (response.hasOwnProperty(key)) {
                let val = response[key];
                menu.value = val['menu'];
                harga.value = val['harga'];
                detail.value = val['detail'];
                if (val['img'] == "") {
                  document.getElementById("ambil_gambar").value = '1';
                } else {
                  document.getElementById("gambar_lama").value = val['img'];
                  document.getElementById("ambil_gambar").innerHTML = '<img width="100" src="image/' + val['img'] + '">';
                }
                document.getElementById("id_menu").value = val['id_menu'];
              }
            }
          }
        };
        xhttp.send();
      }

      function validasi() {
        let menu = document.getElementById("menu").value;
        let harga = document.getElementById("harga").value;
        let detail = document.getElementById("detail").value;
        let img = document.getElementById("img").files;
        let msg = document.getElementById('alert');

        if (menu != "" && harga != "") {
          let xhttp = new XMLHttpRequest();
          xhttp.open("POST", "../proses/ajaxfile.php", true);
          xhttp.setRequestHeader("Content-Type", "application/json");
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              // Response
              let response = this.responseText;
              if (response == 1) {
                alert("Insert successfully.");
                loadEmployees();
              }
            }
          };
          let data = {
            menu: menu,
            harga: harga,
            detail: detail,
            img: img,
          };
          xhttp.send(JSON.stringify(data));
        } else {
          alert('Data Harus Diisi');
          window.location = 'dashboard.php';
          return false;
        }
      }

      function insert() {
        let menu = document.getElementById('menu').value;
        let harga = document.getElementById('harga').value;
        let detail = document.getElementById('detail').value;
        let files = document.getElementById('img').files;

        if (files.length > 0) {
          let formData = new FormData();
          formData.append("img", files[0]);
          formData.append("menu", menu);
          formData.append("harga", harga);
          formData.append("detail", detail);
          let xhttp = new XMLHttpRequest();
          xhttp.open("POST", "../Proses/ajaxfile.php?request=2", true);
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              let response = this.responseText;
              if (response == 1) {
                alert("Upload Sukses");
                loadEmployees();
                document.getElementById("menu").value = "";
                document.getElementById("harga").value = "";
                document.getElementById("detail").value = "";
                document.getElementById("img").value = "";
              } else {
                alert("Upload Gagal");
              }
            }
          };
          xhttp.send(formData);
        }
      }

      function hapus(id_menu) {
        let xhttp = new XMLHttpRequest();
        let konfirmasi = confirm("Yakin ? Mau di Hapus ?");
        if (konfirmasi) {
          xhttp.open("GET", "../Proses/ajaxfile.php?request=3&id_menu=" + id_menu, true);
          xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              let response = this.responseText;
              if (response == 1) {
                alert("Delete successfully.");
                loadEmployees();
              }
            }
          };
          xhttp.send();
        }
      }

      function update() {
        let id_menu = document.getElementById('id_menu').value;
        let menu = document.getElementById('menu').value;
        let harga = document.getElementById('harga').value;
        let detail = document.getElementById('detail').value;
        let gambar_lama = document.getElementById('gambar_lama').value;
        let files = document.getElementById('img').files;
        if (files.length > 0) {
          let formData = new FormData();
          formData.append("img", files[0]);
          formData.append("id_menu", id_menu);
          formData.append("menu", menu);
          formData.append("harga", harga);
          formData.append("detail", detail);
          formData.append("gambar_lama", gambar_lama);

          let xhttp = new XMLHttpRequest();
          xhttp.open("POST", "../Proses/ajaxfile.php?request=5", true);
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              let response = this.responseText;
              if (response == 1) {
                alert("Upload Sukses");
                loadEmployees();

                document.getElementById("id_menu").value = '';
                document.getElementById("gambar_lama").value = "";
                document.getElementById("menu").value = "";
                document.getElementById("harga").value = "";
                document.getElementById("detail").value = "";
                document.getElementById("img").value = "";

                btn.hidden = false;
                btn_update.hidden = true;
              } else {
                alert("Upload Gagal");
              }
            }
          };
          xhttp.send(formData);
        }
      }


      function loadEmployees() {
        let xhttp = new XMLHttpRequest();

        // Set GET method and ajax file path with parameter
        xhttp.open("GET", "../proses/ajaxfile.php?request=1", true);

        // Content-type
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        // call on request changes state
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {

            // Parse this.responseText to JSON object
            let response = JSON.parse(this.responseText);

            // Select <table id='empTable'> <tbody>
            let empTable =
              document.getElementById("empTable").getElementsByTagName("tbody")[0];

            // Empty the table <tbody>
            empTable.innerHTML = "";

            // Loop on response object
            for (var key in response) {
              if (response.hasOwnProperty(key)) {
                let val = response[key];

                // insert new row
                let NewRow = empTable.insertRow(-1);
                let no = NewRow.insertCell(0);
                let menu = NewRow.insertCell(1);
                let harga = NewRow.insertCell(2);
                let detail = NewRow.insertCell(3);
                let img = NewRow.insertCell(4);
                let action = NewRow.insertCell(5);

                no.innerHTML = val['no'];
                menu.innerHTML = val['menu'];
                harga.innerHTML = val['harga'];
                detail.innerHTML = val['detail'];
                img.innerHTML = '<img width="100" src="../image/' + val['img'] + '">';
                action.innerHTML = '<a onclick="edit(' + val['id_menu'] + ')" class="btn_edit">UPDATE</a>  <a onclick="hapus(' + val['id_menu'] + ')" class="btn_delete">DELETE</b>';
              }
            }
          }
        };

        // Send request
        xhttp.send();
      }
    </script>

</body>

</html>