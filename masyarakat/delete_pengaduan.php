<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['nik'])) {
		header("Location: login_masyarakat.php");
	}
	$id_pengaduan = $_GET['id_pengaduan'];

	$deletePengaduan = mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");

	if ($deletePengaduan) {
		header("Location: show_pengaduan.php");
	}

 ?>