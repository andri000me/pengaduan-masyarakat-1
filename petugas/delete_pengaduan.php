<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
	}
	$id_pengaduan = $_GET['id_pengaduan'];

	$deletePengaduan = mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");

	if ($deletePengaduan) {
		header("Location: show_pengaduan.php");
	}

 ?>