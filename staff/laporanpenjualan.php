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
	<title>Laporan Penjualan</title>
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
<center>
<div class="container my-5">
	<div class="row">
		<div class="col">
			<div class="card w-75">
				<div class="card-header bg-danger text-white">
				<h2 class="card-title">Submit Penjualan</h2>
				</div>
				<div class="card-body">
				<form method="post" action="submitpenjualan.php">
				<table cellpadding="10" cellspacing="0">
					<tr>
						<td><div class="form-group ml-5 mr-5">
                        <select name="rasa1" class="form-control form-control-lg radius">
                            <option>Pilih Rasa 1</option>
                            <option value="-">-</option>
                            <option value="Asin">Asin</option>
                            <option value="Pedas Level 1">Pedas Level 1</option>
                            <option value="Pedas Level 2">Pedas Level 2</option>
                            <option value="Pedas Level 3">Pedas Level 3</option>
                            <option value="Balado">Balado</option>
                            <option value="BBQ">BBQ</option>
                            <option value="Rumput Laut">Rumput Laut</option>
                            <option value="Keju Manis">Keju Manis</option>
                            <option value="Jagung Manis">Jagung Manis</option>
                            <option value="Daun Jeruk">Daun Jeruk</option>
                    </select>
                </td>
            </tr>
            <tr>
                    <td><select name="rasa2" class="form-control form-control-lg radius">
                            <option>Pilih Rasa 2</option>
                            <option value="-">-</option>
                            <option value="Asin">Asin</option>
                            <option value="Pedas Level 1">Pedas Level 1</option>
                            <option value="Pedas Level 2">Pedas Level 2</option>
                            <option value="Pedas Level 3">Pedas Level 3</option>
                            <option value="Balado">Balado</option>
                            <option value="BBQ">BBQ</option>
                            <option value="Rumput Laut">Rumput Laut</option>
                            <option value="Keju Manis">Keju Manis</option>
                            <option value="Jagung Manis">Jagung Manis</option>
                            <option value="Daun Jeruk">Daun Jeruk</option>
                    </select></td>
           	</tr>
           	<tr>
                    <td><select name="rasa3" class="form-control form-control-lg radius">
                            <option>Pilih Rasa 3</option>
                            <option value="-">-</option>
                            <option value="Asin">Asin</option>
                            <option value="Pedas Level 1">Pedas Level 1</option>
                            <option value="Pedas Level 2">Pedas Level 2</option>
                            <option value="Pedas Level 3">Pedas Level 3</option>
                            <option value="Balado">Balado</option>
                            <option value="BBQ">BBQ</option>
                            <option value="Rumput Laut">Rumput Laut</option>
                            <option value="Keju Manis">Keju Manis</option>
                            <option value="Jagung Manis">Jagung Manis</option>
                            <option value="Daun Jeruk">Daun Jeruk</option>
                    </select>
                	</td>
					</tr>
				</table>
				<button type="submit" class="btn btn-primary" name="enter">Enter</button>
				<a class="btn btn-secondary" href="dashboard.php">Kembali</a>
			</div>
		</form>
		</div>
	</div>
	<div class="col">

		<div class="card">
			<div class="card-header bg-danger text-white">
				<h2 class="card-title">Laporan Penjualan</h2>
			</div>
			<div class="card-body">
				<form method="post" action="">
					<b>Laporan Bulanan</b>
					<br>
					<label>Bulan</label>
					<select name="bulan">
                            <option>Pilih Bulan</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                    </select>
                    <label>Tahun</label>
                    <input type="text" name="tahun" placeholder="Masukkan Tahun">
                    <button type="submit" name="carilaporan" class="btn btn-primary">Lihat Laporan</button>

                    <br><br>

                    <b>Laporan Harian</b>
                    <br>
					<label>Cari Tanggal</label>
					<input type="date" name="caritanggal">
					<button type="submit" name="caritgl" class="btn btn-primary">Cari
					</button>
				</form>
				<br>
				<table cellpadding="10" cellspacing="0" border="1" style="align-content: center;">
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Rasa 1</th>
						<th>Rasa 2</th>
						<th>Rasa 3</th>
						<th>ID Penjualan</th>
					</tr>
					<?php
					$no = 1;
					if(isset($_POST['caritgl'])){
						$caritanggal = strtotime($_POST['caritanggal']);
						$caritanggal = date('Y-m-d', $caritanggal);
						$result = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE tanggal = '$caritanggal'");

					}else if(isset($_POST['carilaporan'])){
						$bulan = $_POST['bulan'];
						$tahun = $_POST['tahun'];
						$result = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");

					}else{
						$result = mysqli_query($koneksi, "SELECT * FROM penjualan ORDER BY tanggal ASC");
					}
					while($d = mysqli_fetch_array($result)){
						?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['tanggal'];?></td>
						<td><?php echo $d['rasa1'];?></td>
						<td><?php echo $d['rasa2'];?></td>
						<td><?php echo $d['rasa3'];?></td>
						<td><?php echo $d['id_penjualan'];?></td>
					</tr>
					<?php
			}
					?>
			
				</table>
		</div>
	</div>

</body>
</html>