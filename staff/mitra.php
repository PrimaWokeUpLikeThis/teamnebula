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
	<div class="row">
		<div class="col">
		<div class="card w-75">
			<div class="card-header bg-danger text-white">
				<h2 class="card-title">Tambah Mitra</h2>
			</div>
			<div class="card-body">
				<form method="post" action="submitmitra.php">
				<table cellpadding="10" cellspacing="0">
				<tr>
					<td><input type="text" name="nama_mitra" class="form-control form-control-lg" placeholder="Nama Mitra" required></td>
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
					<td><input type="text" name="alamat" class="form-control form-control-lg" placeholder="Alamat Mitra" required></td>
				</tr>
				<tr>
					<td><input type="text" name="telp" class="form-control form-control-lg" placeholder="No. Telpon" required></td>
				</tr>
				<tr>
					<td><label>Tanggal Kerjasama :</label>
						<input type="date" name="tglkerjasama" class="form-control form-control-lg" placeholder="Tanggal Kerjasama"></td>
				</tr>	
				</table>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	</div>
	<div class="col">
	<div class="card">
		<div class="card-header bg-danger text-white">
			<h2 class="card-title">Daftar Mitra</h2>
		</div>
		<div class="card-body">
			<table cellpadding="10" cellspacing="0">
			<tr>
				<th>No</th>
				<th>Nama Mitra</th>
				<th>ID Mitra</th>
				<th>Jenis Mitra</th>
				<th>Alamat</th>
				<th>No. Telpon</th>
				<th>Tanggal Kerjasama</th>
				<th>Opsi</th>
			</tr>
			<?php
			include "config.php";
			$no = 1;
			$result = mysqli_query($koneksi, "SELECT * FROM mitra ORDER BY nama_mitra");
			while($d = mysqli_fetch_array($result)){
			?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $d['nama_mitra'];?></td>
				<td><?php echo $d['id_mitra'];?></td>
				<td><?php echo $d['jenis_mitra'];?></td>
				<td><?php echo $d['alamat'];?></td>
				<td><?php echo $d['telp'];?></td>
				<td><?php echo $d['tglkerjasama'];?></td>
				<td><a href="editmitra.php?id_mitra=<?php echo $d['id_mitra'];?>" class="btn btn-warning">Edit</a>
					<a href="hapusmitra.php?id_mitra=<?php echo $d['id_mitra'];?>" class="btn btn-danger" onclick="return confirmAction()">Hapus</a></td>
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
</body>
</html>