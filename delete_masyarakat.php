<?php 
	require 'koneksi.php';
	$nik = $_GET['nik'];

	$deleteMasyarakat = mysqli_query($koneksi, "DELETE FROM masyarakat WHERE nik = '$nik'");
	if ($deleteMasyarakat) {
		header("Location: show_masyarakat.php");
	}
 ?>