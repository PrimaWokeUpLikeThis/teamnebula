<?php
include "config.php";
session_start();

$timezone = date_default_timezone_set('Asia/Jakarta');
$tanggal = date('d M Y');

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<title>Stok Barang</title>
</head>
<body>
<nav class="navbar navbar-light bg-danger text-white">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item" style="margin-left: 10px;">
			<h2>Laporan Penjualan</h2>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item" style="margin-right: 10px;">
			<h4><?php echo $tanggal;?></h4>
		</li>
	</ul>
</nav>
<div class="container my-5">
	<center>
	<div class="row">
		<div class="col">
		<div class="card w-75">
			<div class="card-header bg-danger text-white">
</body>
</html>