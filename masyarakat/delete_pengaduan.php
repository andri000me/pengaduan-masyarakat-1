<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['nik'])) {
		header("Location: login_masyarakat.php");
		exit();
	}

	$id_pengaduan = $_GET['id_pengaduan'];
	// jika status pengaduan selesai, tidak dapat dihapus
	$dataPengaduan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'"));
	if ($dataPengaduan['status'] == 'selesai') {
		echo "data pengaduan tidak dapat dihapus, karena statusnya selesai";
		header("Location: show_pengaduan.php");
		exit();
	}

	$deletePengaduan = mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");

	if ($deletePengaduan) {
		header("Location: show_pengaduan.php");
		exit();
	}

 ?>