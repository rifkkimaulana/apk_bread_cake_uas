<?php
include_once("../config/config.php");

// Ambil data dari formulir
$nama_lengkap = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$pesan = $_POST['message'];
$status = 'belum dibaca'; // Set default status

// Query untuk menyimpan data ke tabel tb_pesan
$query = "INSERT INTO tb_pesan (nama_lengkap, email, subject, pesan, status) VALUES ('$nama_lengkap', '$email', '$subject', '$pesan', '$status')";
$result = mysqli_query($mysqli, $query);

if ($result) {
  // Data berhasil disimpan, arahkan kembali ke halaman utama
  echo '<script>alert("Pesan berhasil dikirim!"); window.location.href = "../";</script>';
  exit();
} else {
  // Terjadi kesalahan. Tampilkan pesan error atau lakukan tindakan yang sesuai.
}
?>