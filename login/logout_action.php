<?php
session_start();

unset($_SESSION['id_user']);
unset($_SESSION['username']);
unset($_SESSION['nama']);
unset($_SESSION['email']);

session_unset();
session_destroy();
header('Location:login.php');
