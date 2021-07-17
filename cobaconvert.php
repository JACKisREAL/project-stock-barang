<html>
<head>
 <title>Menampilkan output dari tanggal</title>
</head>
<body>
 <h2>Menampilkan hari, tangga, bulan dan tahun dari tanggal</h2>
 <form method="post" action="">
  <input type="date" name="date" required>
  <button type="submit" name="submit">Kirim</button>
 </form><br/>
 <?php
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

if(isset($_POST['submit'])) {
 // ubah ke format tanggal indo yaitu tgl-bln-thn
 $format_indo = date('d-m-Y', strtotime($_POST['date']));
 // pecah tanggal menjadi array
 $pecah = explode('-', $format_indo);

 $hari = date('D', strtotime($format_indo));
 $tgl = $pecah[0];
 $bulan = $pecah[1];
 $tahun = $pecah[2];

 echo hari_indo($hari) . ' ' . $tgl . ' ' . bulan_indo((int)$bulan) . ' ' . $tahun;
}?>
</body>
</html>
