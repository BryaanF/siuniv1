<?php
session_start();
include '../connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == "" || $password == "")
{
  header("location: form-login.php?pesan=gagal");
}
else  {
  header("location: form-login.php?pesan=gagal");
}

$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($connect, $query);

$num = mysqli_num_rows($result);

if ($num == 1) {

$data = mysqli_fetch_assoc($result);

if ($data['level'] == "admin"){
  $_SESSION['username'] = $username;
  $_SESSION['level'] = "admin";
  header("location: ../matakuliah/read.php?pesan=login");
}
else if ($data['level'] == "operator"){
  $_SESSION['username'] = $username;
  $_SESSION['level'] = "operator";
  header("location: ../matakuliah/read.php?pesan=login");
}
elseif ($data['level'] == "user") {
  $_SESSION['username'] = $username;
  $_SESSION['level'] = "user";
  header("location: ../matakuliah/read.php?pesan=login");
}
else {
  header("location:form-login.php?pesan=gagal");
}

}

 ?>
