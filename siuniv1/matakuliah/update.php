<?php

include '../connect.php';

$kode = $_POST['kode'];
$id_dosen = $_POST['id_dosen'];
$nama_matkul = $_POST['nama_matkul'];
$sks = $_POST['sks'];
$semester = $_POST['semester'];

echo "$nama_matkul";

$query = "UPDATE matakuliah SET nama_matkul = '$nama_matkul',
                                sks = $sks,
                                semester = $semester,
                                id_dosen = $id_dosen
          WHERE kode = '$kode'";

$result = mysqli_query($connect,$query);
$num = mysqli_affected_rows($connect);

if ($num > 0) {
  echo "Berhasil ubah data <br>";
  echo '<td>
           <img src="centang.png" width="100" /><br />
       </td>';
}
else {
  echo "Gagal ubah data <br>";
  echo '<td>
           <img src="silang.png" width="100" /><br />
       </td>';
}

echo "<a href='read.php'>Lihat data</a>";
?>
