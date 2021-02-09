<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
	}
	$nik = $_GET['nik'];

	$deleteMasyarakat = mysqli_query($koneksi, "DELETE FROM masyarakat WHERE nik = '$nik'");
	if ($deleteMasyarakat) {
		header("Location: show_masyarakat.php");
	}
 ?>