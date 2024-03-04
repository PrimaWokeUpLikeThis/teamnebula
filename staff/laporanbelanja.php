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
<div class="container my-5">
	<center>
	<div class="row">
		<div class="col">
		<div class="card w-75">
			<div class="card-header bg-danger text-white">
				<h2 class="card-title">Submit Laporan</h2>
			</div>
			<div class="card-body">
				<form method="post" action="submitbelanja.php">
				<table cellpadding="10" cellspacing="0">
					<tr>
						<td><input type="text" name="nama_produk" class="form-control form-control-lg" placeholder="Nama Produk" required></td>
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
						<td><input type="text" name="nama_toko" class="form-control form-control-lg" placeholder="Nama Toko" required></td>
					</tr>
					<tr>
						<td><input type="id_mitra" name="id_mitra" class="form-control form-control-lg" placeholder="ID Mitra" required></td>
					</tr>
					<tr>
						<td><input type="text" class="form-control form-control-lg" name="harga_satuan" placeholder="Harga Satuan (Rp)" required></td>
					</tr>
					<tr>
						<td><input type="text" name="jumlah" class="form-control form-control-lg" placeholder="Jumlah" required></td>
					</tr>
					<tr>
						<td><input type="date" name="tanggal_belanja" class="form-control" placeholder="Tanggal" required></td>
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
				<h2 class="card-title">Laporan Belanja</h2>
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
					<input type="date" name="caritanggal">
					<button type="submit" name="caritgl" class="btn btn-primary">Cari
					</button>
				</form>
				<br>
				<table cellpadding="10" cellspacing="0" border="1" style="align-content: center;">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Jenis Produk</th>
						<th>Nama Toko</th>
						<th>ID Mitra</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Total</th>
						<th>Tanggal</th>
						<th>ID</th>
						<th>Opsi</th>
					</tr>
					<?php
					$no = 1;
					if(isset($_POST['caritgl'])){
						$caritanggal = strtotime($_POST['caritanggal']);
						$caritanggal = date('Y-m-d', $caritanggal);
						$result = mysqli_query($koneksi, "SELECT * FROM belanja WHERE tanggal_belanja = '$caritanggal'");

					}else if(isset($_POST['carilaporan'])){
						$bulan = $_POST['bulan'];
						$tahun = $_POST['tahun'];
						$result = mysqli_query($koneksi, "SELECT * FROM belanja WHERE MONTH(tanggal_belanja) = '$bulan' AND YEAR(tanggal_belanja) = '$tahun'");

					}else{
						$result = mysqli_query($koneksi, "SELECT * FROM belanja");
					}
					while($d = mysqli_fetch_array($result)){
						?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['nama_produk'];?></td>
						<td><?php echo $d['jenis_produk'];?></td>
						<td><?php echo $d['nama_toko'];?></td>
						<td><?php echo $d['id_mitra'];?></td>
						<td><?php echo $d['harga_satuan'];?></td>
						<td><?php echo $d['jumlah'];?></td>
						<td><?php echo $d['total_harga'];?></td>
						<td><?php echo $d['tanggal_belanja'];?></td>
						<td><?php echo $d['id_belanja'];?></td>
						<td><a href="editbelanja.php?id_belanja=<?php echo $d['id_belanja'];?>" class="btn btn-warning">Edit</a>
							<a href="hapusbelanja.php?id_belanja=<?php echo $d['id_belanja'];?>" class="btn btn-danger" onclick="return confirmAction()" >Hapus</a></td>
					</tr>
					<?php
			}
					?>
				</table>
				<script>
    function confirmAction() {
        // Display an alert with OK and Cancel buttons
        var confirmation = confirm("Apa yakin ingin menghapus data ini?");
        
        // If the user clicks OK, submit the form
        if (confirmation) {
            return true;
        } else {
            // If the user clicks Cancel, prevent the form submission
            alert("Batal Menghapus");
            return false;
        }
    }
    </script>
				<br>
				<table cellpadding="10" cellspacing="0">
					<?php 
						
						if (isset($_POST['caritgl'])) {
						$count = mysqli_query($koneksi, "SELECT sum(total_harga) AS totalpengeluaran FROM belanja WHERE tanggal_belanja = '$caritanggal'");
						}
						else if(isset($_POST['carilaporan'])){
						$count = mysqli_query($koneksi, "SELECT sum(total_harga) AS totalpengeluaran FROM belanja WHERE MONTH(tanggal_belanja) = '$bulan' AND YEAR(tanggal_belanja) = '$tahun'");

					}else {
						$count = mysqli_query($koneksi, "SELECT sum(total_harga) AS totalpengeluaran FROM belanja");	
						}
						$d = mysqli_fetch_array($count);
					?>
					<tr>
						<td><b class="card-text">Total Pengeluaran</b></td>
						<td>:</td>
						<td>Rp <?php echo $d['totalpengeluaran'];?>
					</tr>
				</table>
		</div>
	</div>

</body>
</html>