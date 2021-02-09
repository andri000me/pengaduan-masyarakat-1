<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
	}
	$id_petugas = $_GET['id_petugas'];
	$deletePetugas = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas = '$id_petugas'");

	if ($deletePetugas) {
		header("Location: show_petugas.php");
	}

 ?>