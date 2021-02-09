<?php 
	require 'koneksi.php';
	$id_pengaduan = $_GET['id_pengaduan'];

	$deletePengaduan = mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");

	if ($deletePengaduan) {
		header("Location: show_pengaduan.php");
	}

 ?>