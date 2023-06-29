<?php
include_once("../../config/config.php");
include('session.php');

$id = @$_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM tb_kategori_artikel WHERE id=$id");

header("Location:../dashboard.php?page=kategori_artikel");
