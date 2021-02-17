<?php 
	require '../koneksi.php';
	session_destroy();
	header('Location: login_petugas.php');
	exit();
?>