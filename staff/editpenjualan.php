<?php
include "config.php";
session_start();

$timezone = date_default_timezone_set('Asia/Jakarta');
$tanggalsekarang = date('d M Y');

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
			<h2>Edit Penjualan</h2>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item" style="margin-right: 10px;">
			<h4><?php echo $tanggalsekarang;?></h4>
		</li>
	</ul>
</nav>
<?php
if(isset($_POST['edit'])){
    $id = $_POST['id_penjualan'];
    $tanggal = strtotime($_POST['tanggal']);
    $tanggal = date('Y-m-d', $tanggal);
    $rasa1 = $_POST['rasa1'];
    $rasa2 = $_POST['rasa2'];
    $rasa3 = $_POST['rasa3'];

    $edit = mysqli_query($koneksi, "UPDATE penjualan SET id_penjualan='$id', tanggal = '$tanggal', rasa1='$rasa1', rasa2='$rasa2', rasa3='$rasa3' WHERE id_penjualan = '$id'");
    header("location: laporanpenjualan.php");
}

$id = $_GET['id_penjualan'];
    $sql = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE id_penjualan = '$id'");
    while($d = mysqli_fetch_array($sql)){
?>
<div class="container my-5">
	<center>
		<div class="card w-50">
			<div class="card-header bg-danger text-white">
				<h2 class="card-title">Edit Penjualan</h2>
			</div>
			<div class="card-body">
				<form method="post" action="">
				<table cellpadding="10" cellspacing="0">
                    <tr>
                        <input type="hidden" name="id_penjualan" class="form-control form-control-lg" value="<?php echo $d['id_penjualan'];?>">
                        <td><input type="text" class="form-control form-control-lg" value="ID : <?php echo $d['id_penjualan'];?>" readonly></td>
                    </tr>
                    <tr>
                        <td><input type="date" name="tanggal" value="<?php echo $d['tanggal'];?>" class="form-control form-control-lg" readonly></td>
                    </tr>
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
				<button type="submit" class="btn btn-primary" name="edit">Edit</button>
				<a class="btn btn-secondary" href="laporanpenjualan.php">Batal</a>
			</div>
		</form>
		</div><?php
    }
        ?>
        </body>
        </html>
