<?php
session_start();
if(isset($_SESSION['LOGIN'])){
    header("Location:../index2.php");
    exit();
    }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <form action="registerasi.php" method="POST" name="form1">
        <tABLE>
            <tr>
                <div><td> Masukkan ID   </td>
                    <td>: <input type="text" maxlength="20" name="userid" id="username" size="20" placeholder="minimal 8 karakter" min="8"><br></td></div>
                
            </tr>
            <tr>
                <div>
                <td>Masukkan Password   </td>
                <td>: <input type="password" maxlength="15" size="15" name="pw" id="pw" placeholder="minimal 8 karakter" ><br></td>
                </div>
                
            </tr>
        </tABLE> 
         <div>
             <input type="submit" value="Registerasi" id="reg">   
            <input type="reset" value="reset" id="reset">
         </div>
    </form>
</body>
</html>