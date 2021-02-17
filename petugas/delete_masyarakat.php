<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
		exit();
	}
	
	// jika level petugas selain admin, tidak dapat menghapus
	if ($_SESSION['level'] != 'admin') {
		echo "data masyarakat tidak dapat dihapus, karena bukan admin";
		header("Location: show_masyarakat.php");
		exit();
	}
	
	$nik = $_GET['nik'];

	$deleteMasyarakat = mysqli_query($koneksi, "DELETE FROM masyarakat WHERE nik = '$nik'");
	if ($deleteMasyarakat) {
		header("Location: show_masyarakat.php");
		exit();
	}
 ?>