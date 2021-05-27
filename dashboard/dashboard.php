<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/tabel.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
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
      <h3>Kelola </h3>
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
      <a href="#"><i class="fas fa-cogs"></i><span>Components</span></a>
      <a href="#"><i class="fas fa-table"></i><span>Tables</span></a>

    </div>
  </div>
  <!--mobile navigation bar end-->
  <!--sidebar start-->
  <div class="sidebar">
    <div class="profile_info">
      <img src="" class="profile_image" alt="img">
      <h4>...</h4>
    </div>
    <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
    <a href="#"><i class="fas fa-cogs"></i><span>Components</span></a>
    <a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
    <!--sidebar end-->
  </div>
  <div class="content">
    <div class="card">
      <div class="judul">Tambah Data </div>
      <div id="data">
        <input placeholder="Nama Menu" type="text" name="menu" id="menu">
        <input placeholder="Harga" type="text" name="harga" id="harga">
        <input placeholder="detail" type="text" name="detail" id="detail">
        <input placeholder="img" type="text" name="img" id="img">
        <button name="submit" type="submit" id="submit" onclick="validasi()">Tambahkan</button>
      </div>
    </div>
    <div class="card">
      <table id='empTable'>
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
    <div class=" card">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.nav_btn').click(function() {
        $('.mobile_nav_items').toggleClass('active');
      });
    });
  </script>
  <script type="text/javascript">
    function validasi() {
      var menu = document.getElementById("menu").value;
      var harga = document.getElementById("harga").value;
      var detail = document.getElementById("detail").value;
      var img = document.getElementById("img").value;
      var msg = document.getElementById('alert');

      if (menu != "" && harga != "") {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../proses/ajaxfile.php", true);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            // Response
            var response = this.responseText;
            if (response == 1) {
              alert("Insert successfully.");

            }
          }
        };
        var data = {
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

    loadEmployees();

    // Load records with GET request
    function loadEmployees() {
      var xhttp = new XMLHttpRequest();

      // Set GET method and ajax file path with parameter
      xhttp.open("GET", "../proses/ajaxfile.php?request=1", true);

      // Content-type
      xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      // call on request changes state
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

          // Parse this.responseText to JSON object
          var response = JSON.parse(this.responseText);

          // Select <table id='empTable'> <tbody>
          var empTable =
            document.getElementById("empTable").getElementsByTagName("tbody")[0];

          // Empty the table <tbody>
          empTable.innerHTML = "";

          // Loop on response object
          for (var key in response) {
            if (response.hasOwnProperty(key)) {
              var val = response[key];

              // insert new row
              var NewRow = empTable.insertRow(-1);
              var no = NewRow.insertCell(0);
              var menu = NewRow.insertCell(1);
              var harga = NewRow.insertCell(2);
              var detail = NewRow.insertCell(3);
              var action = NewRow.insertCell(5);

              no.innerHTML = val['no'];
              menu.innerHTML = val['menu'];
              harga.innerHTML = val['harga'];
              detail.innerHTML = val['detail'];
              action.innerHTML = val['action'];

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