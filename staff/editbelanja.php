<?php
include "config.php";
if(isset($_POST['edit'])){
	$id = $_POST['id_belanja'];
	$namaproduk = $_POST['nama_produk'];
	$jenisproduk = $_POST['jenis_produk'];
	$namatoko = $_POST['nama_toko'];
	$idmitra = $_POST['id_mitra'];
	$hargasatuan = $_POST['harga_satuan'];
	$jumlah = $_POST['jumlah'];
	$tglbelanja = strtotime($_POST['tanggal_belanja']);
	$tglbelanja = date('Y-m-d', $tglbelanja);

	$sql = mysqli_query($koneksi, "UPDATE belanja SET nama_produk = '$namaproduk', jenis_produk='$jenisproduk', nama_toko = '$namatoko', id_mitra = '$idmitra', harga_satuan = '$hargasatuan', jumlah = '$jumlah', total_harga = '$hargasatuan'*'$jumlah', tanggal_belanja = '$tglbelanja' WHERE id_belanja = '$id'");
	header('location: laporanbelanja.php');
}

$id = $_GET['id_belanja'];
$result = mysqli_query($koneksi, "SELECT * FROM belanja WHERE id_belanja = '$id'");
while ($d = mysqli_fetch_array($result)) {
	
?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<title>Laporan Penjualan</title>
</head>
<body>
<nav class="navbar navbar-light bg-danger text-white">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item" style="margin-left: 10px;">
			<h2>Edit Laporan</h2>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item" style="margin-right: 10px;">
		</li>
	</ul>
</nav>
<div class="container my-5">
	<center>
		<div class="card w-50">
			<div class="card-header bg-danger text-white">
				<h2 class="card-title">Submit Laporan</h2>
			</div>
			<div class="card-body">
				<form method="post" action="editbelanja.php">
				<table cellpadding="10" cellspacing="0">
					<tr>
						<input type="hidden" name="id_belanja" value="<?php echo $d['id_belanja'];?>">
						<td><input type="text" name="nama_produk" class="form-control form-control-lg" value="<?php echo $d['nama_produk'];?>"  placeholder="Nama Produk" required></td>
					</tr>
					<tr>
						<td><select name="jenis_produk" class="form-control form-control-lg">
							<option>Jenis Produk</option>
							<option value="Bahan Pangan">Bahan Pangan</option>
							<option value="Bahan Non Pangan">Bahan Non-Pangan</option>
							<option value="Peralatan">Peralatan</option>
							<option value="Operasional">Operasional</option>
							<option value="Reparasi">Reparasi</option>
						</select>
						</td>
					</tr>
					<tr>
						<td><input type="text" name="nama_toko" class="form-control form-control-lg" placeholder="Nama Toko" value="<?php echo $d['nama_toko'];?>" required></td>
					</tr>
					<tr>
						<td><input type="id_mitra" name="id_mitra" class="form-control form-control-lg" placeholder="ID Mitra" value="<?php echo $d['id_mitra'];?>" required></td>
					</tr>
					<tr>
						<td><input type="text" class="form-control form-control-lg" name="harga_satuan" placeholder="Harga Satuan (Rp)" value="<?php echo $d['harga_satuan'];?>" required></td>
					</tr>
					<tr>
						<td><input type="text" name="jumlah" class="form-control form-control-lg" placeholder="Jumlah" value="<?php echo $d['jumlah'];?>" required></td>
					</tr>
					<tr>
						<td><input type="date" name="tanggal_belanja" class="form-control" placeholder="Tanggal" value="<?php echo $d['tanggal_belanja'];?>" required></td>
					</tr>
					<?php } ?>
				</table>
				<button type="submit" class="btn btn-primary" name="edit">Enter</button>
				<a class="btn btn-secondary" href="laporanbelanja.php">Kembali</a>
			</div>
		</form>
		</div>
