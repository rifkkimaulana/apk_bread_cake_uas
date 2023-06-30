<?php
include_once("../config/config.php");

$nama_lengkap = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$pesan = $_POST['message'];
$status = 'belum dibaca';

$query = "INSERT INTO tb_pesan (nama_lengkap, email, subject, pesan, status) VALUES ('$nama_lengkap', '$email', '$subject', '$pesan', '$status')";
$result = mysqli_query($mysqli, $query);

if ($result) {
  echo '<script>alert("Pesan berhasil dikirim!"); window.location.href = "../";</script>';
  exit();
} else {
}
?>