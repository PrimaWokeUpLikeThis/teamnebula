<?php
include "config.php";
if(isset($_POST['edit'])){
	$id = $_POST['id_mitra'];
	$namamitra = $_POST['nama_mitra'];
	$jenismitra = $_POST['jenis_mitra'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$tglkerjasama = strtotime($_POST['tglkerjasama']);
	$tglkerjasama = date('Y-m-d', $tglkerjasama);

	$sql = mysqli_query($koneksi, "UPDATE mitra SET nama_mitra = '$namamitra', jenis_mitra='$jenismitra', alamat = '$alamat', telp = '$telp', tglkerjasama = '$tglkerjasama' WHERE id_mitra = '$id'");
	header('location: mitra.php');
}

$id = $_GET['id_mitra'];
$result = mysqli_query($koneksi, "SELECT * FROM mitra WHERE id_mitra = '$id'");
while ($d = mysqli_fetch_array($result)) {
	
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<title>Mitra</title>
</head>
<body>
<nav class="navbar navbar-light bg-danger text-white">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item" style="margin-left: 10px;">
			<h2>Daftar Mitra</h2>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item" style="margin-right: 10px;">
	</ul>
</nav>
<div class="container my-5">
	<center>
		<div class="card w-50">
			<div class="card-header bg-danger text-white">
				<h2 class="card-title">Tambah Mitra</h2>
			</div>
			<div class="card-body">
				<form method="post" action="">
				<table cellpadding="10" cellspacing="0">
				<tr>
					<input type="hidden" name="id_mitra" value="<?php echo $d['id_mitra'];?>">
					<td><input type="text" name="nama_mitra" class="form-control form-control-lg" value="<?php echo $d['nama_mitra'];?>" placeholder="Nama Mitra" required></td>
				</tr>
				<tr>
					<td><select class="form-control form-control-lg" name="jenis_mitra">
						<option>Jenis Mitra</option>
						<option value="Supplier Bahan Pangan">Supplier Bahan Pangan</option>
						<option value="Supplier Bahan Non-Pangan">Supplier Bahan Non-Pangan</option>
						<option value="Supplier Peralatan">Supplier Peralatan</option>
						<option value="Sewa Lapak">Sewa Lapak</option>
					</select></td>
				</tr>
				<tr>
					<td><input type="text" name="alamat" class="form-control form-control-lg" value="<?php echo $d['alamat'];?>" placeholder="Alamat Mitra" required></td>
				</tr>
				<tr>
					<td><input type="text" name="telp" class="form-control form-control-lg" value="<?php echo $d['telp'];?>" placeholder="No. Telpon" required></td>
				</tr>
				<tr>
					<td><label>Tanggal Kerjasama :</label>
						<input type="date" name="tglkerjasama" class="form-control form-control-lg" value="<?php echo $d['tglkerjasama'];?>" placeholder="Tanggal Kerjasama"></td>
				</tr>
				<?php
			}
				?>	
				</table>
				<button type="submit" name="edit" class="btn btn-primary">Edit</button>
				<a href="mitra.php" class="btn btn-secondary">Batal</a>
			</form>
		</div>
	</div>