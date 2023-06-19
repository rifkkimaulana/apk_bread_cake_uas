<?php
include_once("../config/config.php");
include('session.php');

$id = @$_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM tb_customer WHERE id=$id");

header("Location:../dashboard.php?page=customer");
?>