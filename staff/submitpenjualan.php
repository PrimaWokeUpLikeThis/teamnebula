<?php 
include "config.php";
if(isset($_POST['enter'])){
	$rasa1 = $_POST['rasa1'];
	$rasa2 = $_POST['rasa2'];
	$rasa3 = $_POST['rasa3'];

	$sql = mysqli_query($koneksi, "INSERT INTO penjualan SET tanggal = now(), rasa1 = '$rasa1', rasa2 = '$rasa2', rasa3='$rasa3'");
	header("location: laporanpenjualan.php");
}
?>