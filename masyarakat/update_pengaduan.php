<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['nik'])) {
		header("Location: login_masyarakat.php");
	}
	$masyarakat = mysqli_query($koneksi, "SELECT * FROM masyarakat ORDER BY nik ASC");
	
	$id_pengaduan = $_GET['id_pengaduan'];
	$getPengaduanById = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");
	$dataPengaduan = mysqli_fetch_assoc($getPengaduanById);


	if (isset($_POST['btnUpdatePengaduan'])) {
		$nik = $_SESSION['nik'];
		$tgl_pengaduan = $_POST['tgl_pengaduan'];
		$isi_laporan = $_POST['isi_laporan'];

		if ($_FILES['foto']['name'] != "") {
			$ekstensi_diperbolehkan	= array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
			$foto = $_FILES['foto']['name'];
			$x = explode('.', $foto);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['foto']['size'];
			$file_tmp = $_FILES['foto']['tmp_name'];	

			if (in_array($ekstensi, $ekstensi_diperbolehkan) == true){
				if($ukuran < 204800){			
					move_uploaded_file($file_tmp, '../img/' . $foto);
				}
			}
		} else {
			$foto = $_POST['foto_lama'];
		}

		$updatePengaduan = mysqli_query($koneksi, "UPDATE pengaduan SET tgl_pengaduan = '$tgl_pengaduan', nik = '$nik', isi_laporan = '$isi_laporan', foto = '$foto' WHERE id_pengaduan = '$id_pengaduan'");
		if ($updatePengaduan) {
			header("Location: show_pengaduan.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ubah Pengaduan - <?= $dataPengaduan['isi_laporan']; ?></title>
</head>
<body>
	<?php include 'sidebar.php'; ?>
	
	<form method="post" enctype="multipart/form-data">
		<input type="hidden" name="foto_lama" value="<?= $dataPengaduan['foto']; ?>">
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td><label>NIK</label></td>
				<td>
					<input type="text" disabled value="<?= $_SESSION['nik']; ?>">
				</td>
			</tr>
			<tr>
				<td><label>Tanggal Pengaduan</label></td>
				<td><input type="date" name="tgl_pengaduan" value="<?= $dataPengaduan['tgl_pengaduan']; ?>"></td>
			</tr>
			<tr>
				<td><label>Isi Laporan</label></td>
				<td><textarea name="isi_laporan"><?= $dataPengaduan['isi_laporan']; ?></textarea></td>
			</tr>
			<tr>
				<td><label>Foto</label></td>
				<td>
					<img style="width: 75px" src="../img/<?= $dataPengaduan['foto']; ?>" alt="foto"><br>
					<input type="file" name="foto">
				</td>
			</tr>
			<tr>
				<td><label>status</label></td>
				<td>
					<input type="text" disabled value="<?= $dataPengaduan['status']; ?>">
				</td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="btnUpdatePengaduan">Kirim</button></td>
			</tr>
		</table>
	</form>
</body>
</html>