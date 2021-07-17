
<!DOCTYPE html>
<html>
<head>
 <title>maribelajarcoding.com</title>
</head>
<body>
 <div align="center">
  <h2>Export Database Mysql ke Excel dengan PHP</h2>
  <a href="export-xls.php">Export xls</a> |
  <a href="export-csv.php">Export csv</a>
  <br><br>
  <table border="1">
   <thead>
    <tr>
     <th>NO</th>
     <th>Kode</th>
     <th>Nama Produk</th>
     <th>Satuan</th>
     <th>Harga</th>
     <th>Stok</th>
    </tr>
   </thead>
   <tbody>
    <?php
    include "pengambilan.php";
     $no=1;
     $sql='SELECT * FROM transaksi';
     $result=mysqli_query($link,$sql);
     while ($data=mysqli_fetch_array($result)) {
    ?>
     <tr>
      <td><?=$no;?></td>
      <td><?=$data['nama'];?></td>
      <td><?=$data['jenis'];?></td>
      <td><?=$data['jumlah'];?></td>
      <td><?=$data['total'];?></td>
      <td><?=$data['tanggal'];?></td>
     </tr>
    <?php
     }
    ?>
   </tbody>
  </table>
  <h4><a href="https://maribelajarcoding.com" target="_blank">maribelajarcoding.com</a></h4>
 </div>
</body>
</html>