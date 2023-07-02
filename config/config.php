<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$db_Host = 'localhost';
$db_Name = 'u1588530_bnc';
$db_Username = 'u1588530_bnc';
$db_Password = '@Unsap324';

$mysqli = mysqli_connect($db_Host, $db_Username, $db_Password, $db_Name);
if (!$mysqli) {
    die("<script>alert(' Gagal tersambung dengan database.')</script>");
}
?>