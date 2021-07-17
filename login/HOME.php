<?php
session_start();
if(!(isset($_SESSION['LOGIN']))){
    header("location:login2.php");
}
if(isset($_GET['out'])){
    $out=$_GET['out'];
    if($out == "keluar"){
        if(isset($_SESSION['LOGIN'])){
            unset($_SESSION['LOGIN']);
            session_unset();
            session_destroy();
            $_SESSION=array();
            }
    header("location: login2.php");
    exit();}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
</head>
<body>
    <h2 style="font-family: sans-serif;;"> Selamat Datang</h2><br>
    <a href="home.php?out=keluar">Log out</a>    
</body>
</html>