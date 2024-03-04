<?php
include "config.php";
$id = $_GET['id_mitra'];
$delete = mysqli_query($koneksi, "DELETE FROM mitra WHERE id_mitra = '$id'");
header('location: mitra.php');
?>