<?php

include '../connect.php';

$query = "SELECT id_dosen, nama_dosen FROM dosen";
$result = mysqli_query($connect, $query);


 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <title></title>
   </head>
   <link rel="stylesheet" href="style create.css">
   <body>

<div class="box">

      <h1>Tambah Data Matakuliah</h1>
     <form class="" action="create.php" method="post">
       <table>

<tr>

       <td><label for="">Kode</label></td> <td> : </td>
      <td><input type="text" name="kode" value=""> </td>
</tr>
<tr>

  <td><label for="">Matakuliah</label></td> <td> : </td>
  <td><input type="text" name="nama_matkul" value=""></td>

</tr>

<tr>

  <td><label for="">SKS</label></td> <td> : </td>
  <td><input type="text" name="sks" value=""></td>

</tr>

<tr>

  <td><label for="">Semester</label></td> <td> : </td>
  <td><input type="text" name="semester" value=""></td>

</tr>
  <tr>

    <td><label for="">Dosen Pengajar</label></td> <td> : </td>
    <td>
    <select name="id_dosen" id="nama_dosen">


    <option value="-">--Pilih salah satu--</option>


            <?php
                while ($data = mysqli_fetch_assoc($result)) {
                  ?>
            <option value="<?php echo $data['id_dosen']; ?>">
            <?php echo $data['nama_dosen']; ?>
            </option>
            <?php
                }
            ?>
          </select>
        </td>
<tr>
  <td></td> <td></td> <td><button>Simpan</button></td>

</tr>

</tr>
</div>
     </form>
 </table>
   </body>
 </html>
