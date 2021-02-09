<?php 
	require 'koneksi.php';
	$id_tanggapan = $_GET['id_tanggapan'];

	$deleteTanggapan = mysqli_query($koneksi, "DELETE FROM tanggapan WHERE id_tanggapan = '$id_tanggapan'");
	if ($deleteTanggapan) {
		header("Location: show_tanggapan.php");
	}

 ?>