<?php
include "config.php";
session_start();
if(isset($_SESSION['id_staff'])){
	header("location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<title>Staff Login</title>
</head>
<body>
	<nav class="navbar navbar-light bg-danger">
		
	</nav>
	<div class="container my-5">
		<center>
		<div class="card w-25">
			<div class="card-header bg-danger text-white">
			<h2 class="card-title">LOGIN</h2>
			</div>
			<div class="card-body">
				<form method="post" action="ceklogin.php">
			<table cellpadding="10" cellspacing="0">
				<tr>
					<td><input type="text" name="id_staff" class="form-control" placeholder="ID Staff" required>
				</tr>
				<tr>
					<td><input type="password" name="password" class="form-control" placeholder="Password" required></td>
				</tr>
			</table>
			<button type="submit" class="btn btn-primary" name="login">Login</button>				
</body>
</html>