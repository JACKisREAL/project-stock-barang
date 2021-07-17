<?php
session_start();
include "koneksi.php";
$syarat1=mysqli_query($link,"SELECT * From tb_data WHERE userid='$_POST[ID]' and pw=md5('$_POST[password]')");
$cek=mysqli_num_rows($syarat1);
if($cek>0){
    echo '<script language="javascript">
    alert("login sukses");   
    </script>';
    header("Location: ../index2.php");
    $_SESSION['LOGIN']=1;
    session_start();
    exit();

}else{
    
    echo '<script language="javascript">
    alert("ID atau Password salah");
    window.location="login2.php";
    </script>';
    
    exit();
    }



?>