<?php
include "config.php";
if(isset($_POST['submit'])){
	$namamitra = $_POST['nama_mitra'];
	$jenismitra = $_POST['jenis_mitra'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$tglkerjasama = strtotime($_POST['tglkerjasama']);
	$tglkerjasama = date('Y-m-d', $tglkerjasama);

	$sql = mysqli_query($koneksi, "INSERT INTO mitra SET nama_mitra = '$namamitra', jenis_mitra='$jenismitra', alamat = '$alamat', telp = '$telp', tglkerjasama = '$tglkerjasama'");
	header('location: mitra.php');
}
?>