<?php 
	require '../koneksi.php';
	$id_tanggapan = $_GET['id_tanggapan'];
	$id_pengaduan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tanggapan WHERE id_tanggapan = '$id_tanggapan'"))['id_pengaduan'];
	$updateStatusPengaduan = mysqli_query($koneksi, "UPDATE pengaduan SET status = 'proses' WHERE id_pengaduan = '$id_pengaduan'");

	$deleteTanggapan = mysqli_query($koneksi, "DELETE FROM tanggapan WHERE id_tanggapan = '$id_tanggapan'");
	if ($deleteTanggapan) {
		header("Location: show_tanggapan.php");
	}

 ?>