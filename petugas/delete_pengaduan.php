<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
		exit();
	}

	// jika level petugas selain admin, tidak dapat menghapus
	if ($_SESSION['level'] != 'admin') {
		echo "data pengaduan tidak dapat dihapus, karena bukan admin";
		header("Location: show_pengaduan.php");
		exit();
	}

	$id_pengaduan = $_GET['id_pengaduan'];

	$deletePengaduan = mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");

	if ($deletePengaduan) {
		header("Location: show_pengaduan.php");
		exit();
	}

 ?>