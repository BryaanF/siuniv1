<?php

session_start();

/* echo $_SESSION['username'],$_SESSION['level']; */

if(!(isset($_SESSION['username'])))
{
  header("location: ../login/form-login.php?pesan=belum_login");
}
include 'connect.php';

$query = "SELECT * FROM user";

$result = mysqli_query($connect, $query);

$num = mysqli_num_rows($result);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">


    <div class="cont-2">
      <h2>Data Matakuliah</h2>
      <table border="1">
        <tr>
          <th id="No">No.</th>
          <th id="username">Username</th>
          <th id="level">Level</th>
        </tr>
        <?php
       if($num > 0)
       {
         $no = 1;
         while ($data = mysqli_fetch_assoc($result)){ ?>

           <tr>
             <td> <?php echo $no; ?> </td>
             <td> <?php echo $data['username'] ?> </a></td>
             <td> <?php echo $data['level'] ?> </td>
           </tr>
         <?php
         $no++;
         }
       }
       else
       {
         echo "<tr> <td colspan='7'> Tidak ada data </td></tr>";
       }
       ?>
        </div>
  </body>
</html>
