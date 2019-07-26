<?php

session_start();

if(!(isset($_SESSION['user'])))
{
  header("location: ../login/form-login.php");
}

include '../connect.php';

$query = "SELECT kode, nama_matkul, sks, semester, nama_dosen
          FROM matakuliah LEFT JOIN Dosen
          USING (id_dosen)
          ORDER BY kode";

$result = mysqli_query($connect, $query);

$num = mysqli_num_rows($result);

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <style media="screen">
     *{
     margin: 0;
     padding: 0;
     }
     table {
       border-collapse: collapse;
       color: black;
       padding: 10px;
       margin: -5px auto;
     }
     tr, td {
       width: auto;
       height: 35px;
       text-align: center;
       /* border-bottom: 1px solid white; */
       border: 1px solid white;
       font-family: 'Cabin';
     }
     tr {background-color: lightgreen;}

     tbody tr:nth-child(odd) td {background-color: pink;}
     tbody tr:nth-child(even) td {background-color: #FF00BF;}
     td a:hover{color: white;}
     a{color: black;}

     .container{
       width: 100%;
       height: 637px;
       display: flex;
     }
     .cont-1{
       width: 25%;
       height: 637px;
       background-color: lightblue;
     }
     .cont-2{
       width: 75%;
       height: 637px;
       background-image: url(bg2.jpg);
     }
     header{
     width: 100%;
     height: 46px;
     background-image: url(bg-copy.jpg);
     background-size: cover;
     text-align: center;
     font-size: 35px;
     padding: 20px 0px;
     font-family: inherit;
     }
     h2{
       font-size: 50px;
       text-align: center;
       padding: 40px;
       font-family: inherit;
     }
     #No{width: 40px;}
     #kode, #sks{width: 65px;}
     #matkul{width: 240px;}
     #smt{width: 80px;}
     #dp{width: 140px;}
     #aksi{width: 150px;}
     #td{
       width: 12%;
       outline: none;
       padding: 7px 11px;
       border: 0;
       font-size: 13px;
       font-weight: bold;
       background: green;
       display: block;
       margin: 20px 650px;
       border-radius: 7px;
     }
     #dm{
       width: 70%;
       outline: none;
       padding: 10px 11px;
       border: 1px #aaa solid;
       font-size: 13px;
       background: #fff;
       display: block;
       margin: 20px auto;
       border-radius: 7px;
     }
     #Logout{
       width: 70%;
       outline: none;
       padding: 10px 11px;
       border: 0;
       font-size: 13px;
       display: block;
       margin: 20px auto;
       border-radius: 7px;
       background-color: red;
       font-weight: bold;
     }
     #dd{
       width: 70%;
       outline: none;
       padding: 10px 11px;
       border: 1px #aaa solid;
       font-size: 13px;
       background: #fff;
       display: block;
       margin: 20px auto;
       border-radius: 7px;
     }
     #mp{
       width: 25%;
       /* outline: none; */
       padding: 8px 11px;
       border: 1px #aaa solid;
       font-size: 13px;
       background: #fff;
       margin: 20px 113px;
     }
     #kg{
       width: 15%;
       outline: none;
       padding: 8px 11px;
       border: 1px #aaa solid;
       font-size: 13px;
       background: #fff;
       margin: 20px -111px;
     }
     #cari{
       width: 7%;
       outline: none;
       padding: 8px 11px;
       border: 1px #aaa solid;
       font-size: 13px;
       background: #fff;
       margin: 10px 112px;
     }

     </style>
   </head>
   <body>
     <div class="container">
       <div class="cont-1">
         <header>
           S I U  N I V
         </header>
         <form action= "../dosen/read-user.php" method="post">
           <input type="submit" name="datadosen" value="Data Dosen" id="dd">
         </form>
         <form action= "../matakuliah/read-user.php" method="post">
           <input type="submit" name="datamatkul" value="Data Matakuliah" id="dm">
         </form>
         <form action= "../Login/logout.php" method="post">
           <input type="submit" name="Logout" value="Logout" id="Logout">
         </form>
   </div>
   <div class="cont-2">
     <h2>Data Matakuliah</h2>
     <form action="search.php" method="get">
       <input type="search" name="cari" placeholder="Masukkan pencarian..." id="mp">
       <select name="kategori" id="kg">
         <option value="nama_matkul">Matakuliah</option>
         <option value="nama_dosen">Dosen</option>
         <option value="sks">SKS</option>
         <option value="semester">Semester</option>
       </select>
       <input type="submit" value="Cari" id="cari">
     </form>
     <table border="1">
       <tr>
         <th id="No">No.</th>
         <th id="kode">Kode</th>
         <th id="matkul">Matakuliah</th>
         <th id="sks">SKS</th>
         <th id="smt">Semester</th>
         <th id="dp">Dosen Pengajar</th>
       </tr>


 <?php
if($num > 0)
{
  $no = 1;
  while ($data = mysqli_fetch_assoc($result)){ ?>

    <tr>
      <td> <?php echo $no; ?> </td>
      <td> <?php echo $data['kode'] ?> </td>
      <td> <?php echo $data['nama_matkul'] ?> </td>
      <td> <?php echo $data['sks'] ?> </td>
      <td> <?php echo $data['semester'] ?> </td>
      <td>
        <?php
        if($data['nama_dosen'] !=NULL)
        { echo $data['nama_dosen']; }
        else { echo "-";}
         ?>
      </td>
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
</table>
</div>
</div>
</body>
</html>
