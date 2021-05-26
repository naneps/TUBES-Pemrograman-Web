<!DOCTYPE html>
<html>

<head>


    <link rel="stylesheet" href="asset/css/login.css">
    <title> Login</title>
</head>

<body>
    <div class="container">


        <form method="post" action="login_action.php">
            <center>
                <h2>Login </h2>
            </center>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" class="kolom" name="username" placeholder="Masukan Username">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="kolom" name="password" placeholder="Masukan Password">
            </div>
            <div class="form-group">
                <button type="submit"> login</button>
                <!-- <button type="button"><a href="register.php">Register</a></button> -->
            </div>
        </form>
    </div>
</body>

</html>