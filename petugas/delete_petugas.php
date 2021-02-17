<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
		exit();
	}

	// jika level petugas selain admin, tidak dapat menghapus
	if ($_SESSION['level'] != 'admin') {
		echo "data petugas tidak dapat dihapus, karena bukan admin";
		header("Location: show_petugas.php");
		exit();
	}

	$id_petugas = $_GET['id_petugas'];
	// jika admin yang melakukan, gugurkan perintah
	$dataPetugas = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'"));

	if ($dataPetugas['level'] == 'admin') {
		echo "data petugas tidak dapat dihapus, karena data admin";
		header("Location: show_petugas.php");
		exit();
	}

	$deletePetugas = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas = '$id_petugas'");


	if ($deletePetugas) {
		header("Location: show_petugas.php");
		exit();
	}

 ?>