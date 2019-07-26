<?php

include '../connect.php';

$id_dosen = $_GET['id_dosen'];

$query = "SELECT * FROM dosen WHERE id_dosen = $id_dosen";

$result = mysqli_query($connect, $query);

$row = mysqli_fetch_assoc($result);

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <title></title>
   </head>
   <body>
     <form action="update.php" method="post">
       <table>
         <tr>
           <td><label for="nama">Nama dosen</label></td>
           <td>:</td>
           <td><input type="text" name="nama_dosen" id="nama" value="<?php echo $row['nama_dosen']; ?>"></td>
         </tr>
         <tr>
           <td><label for="no_telp">No. Telepon</label></td>
           <td>:</td>
           <td><input type="text" name="no_telp" id='no_telp' value="<?php echo $row['no_telp']; ?>"></td>
         </tr>
         <tr>
           <td></td>
           <td><input type="hidden" name="id_dosen" value="<?php echo $row['id_dosen']; ?>"</td>
           <td><input type="submit" value="simpan" name="btnSimpan"></td>
         </tr>
       </table>

     </form>

   </body>
 </html>
