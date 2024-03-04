<?php
include "config.php";

$id = $_GET['id_penjualan'];
$delete = mysqli_query($koneksi, "DELETE FROM penjualan WHERE id_penjualan = '$id'");
header("location: laporanpenjualan.php");
?>