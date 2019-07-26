<!DOCTYPE html>
  <head>
  <title></title>
  </head>
  <link rel="stylesheet" href="../matakuliah/style login.css">
  <body>

    <form class="" action="login.php" method="post">
    <div class="bgvid back">

      <div class="inner-container">

        <div class="box">

          <h1>S I U N I V</h1>

          <input type="text" name="username" placeholder="Username"/>
          <input type="password" name="password" placeholder="Password"/>
          <button>LOGIN</button>
          <?php
        if(isset($_GET['pesan'])){
          if($_GET['pesan'] == "gagal"){
            echo "Username atau password salah silahkan coba lagi";
          }else if($_GET['pesan'] == "logout"){
            echo "Anda telah berhasil logout";
          }else if($_GET['pesan'] == "belum_login"){
            echo "Anda harus login untuk mengakses halaman admin";
          }
        }
        ?>

        </div>
      </div>
    </div>

</form>
  </body>
</html>
