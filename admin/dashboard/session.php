<?php
include('../config/config.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user_check = $_SESSION['username'];
$ses_sql = mysqli_query($mysqli, "SELECT username FROM tb_users WHERE username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];
if (!isset($login_session)) {
    mysqli_close($mysqli);
    header('Location: index.php');
}