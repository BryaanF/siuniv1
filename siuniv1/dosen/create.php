<?php

include '../connect.php';

$nama_dosen = $_POST['nama_dosen'];
$no_telp = $_POST['no_telp'];

$query = "INSERT INTO dosen (nama_dosen, no_telp)
          VALUES ('$nama_dosen','$no_telp')";

$result = mysqli_query($connect, $query);

$num = mysqli_affected_rows($connect);

if ($num > 0) {
  echo "Berhasil tambah data";
}
else {
  echo "Gagal tambah data";
}
echo "<a href='read.php'>Lihat Data</a>";
 ?>
