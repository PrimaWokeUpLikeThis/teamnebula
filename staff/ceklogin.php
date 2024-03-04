<?php
include "config.php";
if (isset($_POST['login'])){
	$id = $_POST['id_staff'];
	$password = $_POST['password'];

	$sql = mysqli_query($koneksi, "SELECT * FROM staff WHERE id_staff ='$id' AND password = '$password'");
	$check = mysqli_fetch_assoc($sql);

	if($check > 0){
		$row = ($sql);
		$_SESSION['id_staff'] = $check['id_staff'];
		$_SESSION['nama'] = $check['nama'];
			echo "<script>alert('Berhasil Login');
			document.location='dashboard.php';</script>";
} else {
	echo "<script>alert('Login Gagal');
			document.location='stafflogin.php';</script>";
}
}
