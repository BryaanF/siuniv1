<?php

include '../connect.php';

$kode = $_GET['kode'];
$query = "DELETE FROM matakuliah WHERE kode = '$kode'";

$result = mysqli_query($connect, $query);

$num = mysqli_affected_rows($connect);

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <title></title>
   </head>
   <body>
<?php

if ($num > 0) {
  echo "Berhasil hapus data <br>";
  echo '<td>
           <img src="centang.png" width="100" /><br />
       </td>';
}
else {
  echo "Gagal hapus data <br>";
  echo '<td>
           <img src="silang.png" width="100" /><br />
       </td>';
}
echo "<a href='read.php'>Lihat data</a>";

 ?>


   </body>
 </html>
