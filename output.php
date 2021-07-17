<?php
include "pengambilan.php";
// fungsi untuk menentukan hari dan mengubahnya
function hari_indo($hari) {

    switch ($hari) {
     case 'Sun':
      $hari_indo = "Minggu";
     break;
    
     case 'Mon':   
      $hari_indo = "Senin";
     break;
    
     case 'Tue':
      $hari_indo = "Selasa";
     break;
    
     case 'Wed':
      $hari_indo = "Rabu";
     break;
    
     case 'Thu':
      $hari_indo = "Kamis";
     break;
    
     case 'Fri':
      $hari_indo = "Jumat";
     break;
    
     case 'Sat':
      $hari_indo = "Sabtu";
     break;
     
     default:
      $hari_indo = "Tidak ada";  
     break;
    }
   
    return $hari_indo;
   }
   
   // fungsi untuk menentukan bulan dan mengubahnya
   function bulan_indo($bulan_angka) {
    $bulan = array(1=>'Januari', 
         'Februari', 
         'Maret', 
         'April', 
         'Mei', 
         'Juni', 
         'Juli', 
         'Agustus', 
         'September', 
         'Oktober', 
         'November', 
         'Desember'
        );

    return $bulan[$bulan_angka];
   }
 // ubah ke format tanggal indo yaitu tgl-bln-thn
 $format_indo = date('d-m-Y', strtotime($_POST['date']));
 // pecah tanggal menjadi array
 $pecah = explode('-', $format_indo);

 $hari = date('D', strtotime($format_indo));
 $tgl = $pecah[0];
 $bulan = $pecah[1];
 $tahun = $pecah[2];
 $tanggal=hari_indo($hari) ." " .$tgl." " . bulan_indo((int)$bulan)." " . $tahun;
 echo $tanggal;
$reseult=mysqli_query($link,"SELECT * FROM transaksi where jumlah<'$_POST[jumlah]' && nama='$_POST[nama]'&& jenis='$_POST[jenis]' ");
$cek=mysqli_num_rows($reseult);
if($cek>0){
    echo '<script language="javascript">
    alert("JUMLAH PERMINTAAN MELEBIHI BARANG");
    window.location="login.php";
    </script>';
}
else{
    $harga=mysqli_query($link,"SELECT total FROM transaksi where nama='$_POST[nama]')/(SELECT jumlah FROM transaksi where nama='$_POST[nama]')*$_POST[jumlah]");
    $sql="INSERT INTO pengambilan (nama_barang,nama,jenis,jumlah,tanggal,harga)
     VALUES ('$_POST[orang]','$_POST[nama]','$_POST[jenis]', '$_POST[jumlah]', '$_POST[harga]', '$tanggal','$harga')";
    if (mysqli_query($link, $sql)) {
        $sql="UPDATE transaksi SET jumlah=jumlah-'$_POST[jumlah]',total=total-(total/jumlah*'$_POST[jumlah]') WHERE id=$data[id]";
        if (mysqli_query($link, $sql)) {
            mysqli_close($link);
            echo '<script language="javascript">
            alert("BARANG TELAH DIAMBIL");
            window.location="meja.html";
            </script>';
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
      }
  } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
  }
  
    exit();
}