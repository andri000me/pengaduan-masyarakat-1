<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
		exit();
	}

	$id_pengaduan = $_GET['id_pengaduan'];

	$pengaduan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'"));

	if ($pengaduan['status'] == 'selesai') {
		echo "data pengaduan tidak dapat ditanggapi, karena sudah selesai";
		header("Location: show_pengaduan.php");
		exit();
	}


	if (isset($_POST['btnInsertTanggapan'])) {
		$tgl_tanggapan = $_POST['tgl_tanggapan'];
		$tanggapan = $_POST['tanggapan'];
		$id_petugas = $_SESSION['id_petugas'];
		$insertTanggapan = mysqli_query($koneksi, "INSERT INTO tanggapan VALUES ('', '$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')");
		$updateStatusPengaduan = mysqli_query($koneksi, "UPDATE pengaduan SET status = 'selesai' WHERE id_pengaduan = '$id_pengaduan'");
		
		if ($insertTanggapan) {
			header("Location: show_tanggapan.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Tanggapan</title>
</head>
<body>
	<?php include 'sidebar.php'; ?>
	<h3>Menanggapi isi laporan <?= $pengaduan['isi_laporan']; ?></h3>
	<form method="post">
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td><label>Isi Laporan</label></td>
				<td>
					<input type="text" disabled value="<?= $pengaduan['isi_laporan']; ?>">
				</td>
			</tr>
			<tr>
				<td><label>Tanggal Tanggapan</label></td>
				<td><input type="date" name="tgl_tanggapan" value="<?= date('Y-m-d'); ?>"></td>
			</tr>
			<tr>
				<td><label>Tanggapan</label></td>
				<td><textarea name="tanggapan"></textarea></td>
			</tr>
			
			<tr>
				<td colspan="2"><button type="submit" name="btnInsertTanggapan">Kirim</button></td>
			</tr>
		</table>
	</form>
</body>
</html>