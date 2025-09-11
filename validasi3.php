<?php

$namaErr = $emailErr = $alamatErr = $passwordErr = $kon_err = "";
$nama = $email = $alamat = $password = $kon_ = "";

function validasi($data): string
{
  $data = htmlspecialchars(string: $data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $valid = true;

  if (empty($_POST["nama"]) || strlen($_POST["nama"]) <= 5) {
    $namaErr = "nama harus lebih dari 5";
    $valid = false;
  } else {
    $nama = $_POST["nama"];
  }

  if (empty($_POST["email"])) {
    $emailErr = "email tidak boleh kosong";
    $valid = false;
  } else {
    $email = $_POST["email"];
  }

  if (empty($_POST["alamat"]) || strlen($_POST["alamat"]) <= 5) {
    $alamatErr = "alamat harus lebih dari 5 karakter";
    $valid = false;

  } else {
    $alamat = $_POST["alamat"];
  }

  if (empty($_POST["password"])) {
    $passwordErr = "password tidak boleh kosong";
    $valid = false;

  } else {
    $password = $_POST["password"];
  }

  if ($_POST["kon_"] != $_POST["password"]) {
    $kon_err = "konfirmasi password tidak sama";
    $valid = false;
  }

  if($valid){
    setcookie("nama" , $nama , time() + 60 , "/");
    setcookie( "email" , $email , time() + 60 , "/" );
    setcookie("alamat" , $alamat , time() + 60 , "/" );
    setcookie("password" , $password , time() + 60 , "/");

    header("location: index.php");
    exit;

  }

}

?>