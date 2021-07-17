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
$reseult=mysqli_query($link,"SELECT * FROM transaksi where nama='$_POST[nama]' ");
$cek=mysqli_num_rows($reseult);
if($cek>0){
    $sql="SELECT * FROM transaksi WHERE nama='$_POST[nama]'&& jenis='$_POST[jenis]'"; 
    $result=mysqli_query($link,$sql);
    if ($data=mysqli_fetch_array($result)) {
        // echo "$data[nama]<br> $data[jenis]";
        $penambahan=$_POST['jumlah']+$data['jumlah'];
        $penambahan_harga=$_POST['harga']+$data['total'];
        echo "$penambahan"." "."$penambahan_harga";
        $sql="UPDATE transaksi SET jumlah=$penambahan,total=$penambahan_harga WHERE id=$data[id]";
        if (mysqli_query($link, $sql)) {
            echo "New record created successfully";
            echo '<script language="javascript">
            alert("BARANG TELAH MASUK SISTEM");
            window.location="meja.php";
            </script>';
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
      }
  } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
  }
    exit();
}
else{
    $sql="INSERT INTO transaksi (nama,jenis,jumlah,total,tanggal) VALUES ('$_POST[nama]','$_POST[jenis]', '$_POST[jumlah]', '$_POST[harga]', '$tanggal')";
    if (mysqli_query($link, $sql)) {
        echo "New record created successfully";
  } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
  }
  mysqli_close($link);
    echo '<script language="javascript">
    alert("BARANG TELAH MASUK SISTEM");
    window.location="meja.php";
    </script>';
    exit();
}
?>