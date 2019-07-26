<?php
include '../connect.php';

$id_dosen = $_POST ['id_dosen'];
$kode = $_POST ['kode'];


$query = "UPDATE matakuliah SET id_dosen = '$id_dosen ' WHERE Kode = '$kode'";
$result = mysqli_query($connect,$query);
echo "$id_dosen";
 ?>
