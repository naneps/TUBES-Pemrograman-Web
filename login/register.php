<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap -->
 
    <link rel="stylesheet" href="regist.css">
</head>
<body>
    <div class="container">
            
  
        <form method="post" action="regist_action.php">
        <center><h2>Regist </h2></center>
        <div class="form-group">
            <label>Nama:</label>  
            <input type="text" class="kolom" name="nama" placeholder="Masukan Nama">
        </div>
        <div class="form-group">
            <label>Username:</label>  
            <input type="text" class="kolom" name="username" placeholder="Masukan Username">
        </div>
        <div class="form-group">
            <label>Email</label>  
            <input type="email" class="kolom" name="email" placeholder="Masukan email">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" class="kolom" name="password" placeholder="Masukan Password">
        </div>
        <div class="form-group">
           <button type="submit"> Regist</button>
        </div>
        </form>
    </div>
</body>
</html>