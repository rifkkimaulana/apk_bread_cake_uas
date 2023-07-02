<?php
include('config/config.php');

$waktuAccess = date("Y-m-d H:i:s");
$ipAddress = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];

$query = "INSERT INTO tb_pengunjung (waktu_access, ip_address, user_agent) VALUES (?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("sss", $waktuAccess, $ipAddress, $userAgent);
$stmt->execute();
$stmt->close();

$mysqli->close();
?>
