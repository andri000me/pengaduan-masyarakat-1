<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
	}
	$pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan");
	$petugas = mysqli_query($koneksi, "SELECT * FROM petugas");
	
	$id_tanggapan = $_GET['id_tanggapan'];
	$getTanggapanById = mysqli_query($koneksi, "SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas WHERE id_tanggapan = '$id_tanggapan'");
	$dataTanggapan = mysqli_fetch_assoc($getTanggapanById);

	if (isset($_POST['btnUpdateTanggapan'])) {
		$tgl_tanggapan = $_POST['tgl_tanggapan'];
		$tanggapan = $_POST['tanggapan'];
		$id_petugas = $_SESSION['id_petugas'];
		$updateTanggapan = mysqli_query($koneksi, "UPDATE tanggapan SET tgl_tanggapan = '$tgl_tanggapan', tanggapan = '$tanggapan', id_petugas = '$id_petugas' WHERE id_tanggapan = '$id_tanggapan'");
		if ($updateTanggapan) {
			header("Location: show_tanggapan.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ubah Tanggapan - <?= $dataTanggapan['tanggapan']; ?></title>
</head>
<body>
	<?php include 'sidebar.php'; ?>
	
	<form method="post">
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td><label>Isi Laporan</label></td>
				<td>
					<input type="text" disabled value="<?= $dataTanggapan['isi_laporan']; ?>">
				</td>
			</tr>
			<tr>
				<td><label>Tanggal Tanggapan</label></td>
				<td><input type="date" name="tgl_tanggapan" value="<?= $dataTanggapan['tgl_tanggapan']; ?>"></td>
			</tr>
			<tr>
				<td><label>Tanggapan</label></td>
				<td><textarea name="tanggapan"><?= $dataTanggapan['tanggapan']; ?></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="btnUpdateTanggapan">Kirim</button></td>
			</tr>
		</table>
	</form>
</body>
</html>