<?php
session_start();
if(isset($_SESSION['LOGIN'])){
    header("Location:../index2.php");
    exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>SELAMAT DATANG DI HALAMAN LOGIN</div>
    <form action="inputmysql.php" method="POST" name="form2">
        <table>
            <div>
                <tr>
                    <td>ID</td>
                    <td>        : <input type="text" maxlength="20" size="20" name="ID" placeholder="Masukkan ID"><br> </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>        : <input type="password" maxlength="15" size="15" name="password" id="pass" placeholder="Masukkan Password"><br> </td>
                        
                    </tr>
            </div>
                      
        </table>
        <div>
            <input type="submit" value="Log in" name="login">
            <input type="reset" value="Reset" name="reset"><br>
            <a href="login.php" style="font-family: arial;color: lightseagreen;">Registrasi</a>
        </div>

    </form>

</body>
</html>