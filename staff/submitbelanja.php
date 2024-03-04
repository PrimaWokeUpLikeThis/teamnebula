<?php
include "config.php";
if (isset($_POST['enter'])) {
	$namaproduk = $_POST['nama_produk'];
	$jenisproduk = $_POST['jenis_produk'];
	$namatoko = $_POST['nama_toko'];
	$idmitra = $_POST['id_mitra'];
	$hargasatuan = $_POST['harga_satuan'];
	$jumlah = $_POST['jumlah'];
	$tanggal = strtotime($_POST['tanggal_belanja']);
	$tanggal = date('Y-m-d', $tanggal);

	$sql = mysqli_query($koneksi, "INSERT INTO belanja SET nama_produk = '$namaproduk', jenis_produk='$jenisproduk', nama_toko = '$namatoko', id_mitra = '$idmitra', harga_satuan='$hargasatuan', jumlah = '$jumlah', total_harga = '$hargasatuan'*'$jumlah', tanggal_belanja = '$tanggal'");
	header('location: laporanbelanja.php');
}
?>