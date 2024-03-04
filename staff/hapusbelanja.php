<?php
include "config.php";
$id = $_GET['id_belanja'];
$delete = mysqli_query($koneksi, "DELETE FROM belanja WHERE id_belanja = '$id'");
header('location: laporanbelanja.php');
?>